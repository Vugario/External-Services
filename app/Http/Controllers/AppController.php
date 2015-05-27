<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\libraries\Webshop;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppController extends Controller {

    /**
     * The homepage of the application to explain its purpose
     *
     * @return \Illuminate\View\View
     */
    public function home()
    {
        return view('app/home');
    }

    /**
     * The dashboard of the logged-in user
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $externalServices = Webshop::instance()->external_services->get();

        return view('app/dashboard', [
            'external_services' => $externalServices
        ]);
    }

    /**
     * This url is called when a SEOshop customer installs this application
     *
     * @param Request $request
     * @return \Illuminate\View\View
     * @throws \Exception
     */
    public function install(Request $request)
    {
        // Make sure we have received all required information
        $this->validate($request, [
            'language'      => 'required',
            'shop_id'       => 'required',
            'signature'     => 'required',
            'timestamp'     => 'required',
            'token'         => 'required'
        ]);

        // Validate the signature
        $signature  = '';
        $input      = $request->except('signature');

        ksort($input);

        // Construct the signature
        foreach ($input as $key => $value)
        {
            $signature .= $key . '=' . $value;
        }

        // The signature contains the app secret
        $signature = md5($signature . config('services.seoshop.secret'));

        // Do the signatures match?
        if ($signature != $request->input('signature'))
        {
            throw new \Exception('The signature does not match. You haven\'t secretly tampered with it no?');
        }

        // Find or create the user
        $shop = Shop::firstOrNew(array('shop_id' => $request->input('shop_id')));
        $shop->language = $request->input('language');
        $shop->token = $request->input('token');
        $shop->save();

        // Authenticate the user
        Auth::loginUsingId($shop->id);

        // Create the external services
        Webshop::instance()->installExternalServices();

        // Were done here
        return redirect('dashboard');
    }

    /**
     * This url is called when a SEOshop customer uninstalls the application
     *
     * @return \Illuminate\View\View
     */
    public function uninstall()
    {
        return view('app/uninstall');
    }

    /**
     * This url is called when a SEOshop customer cancels the application, this does not yet uninstall the app
     * Uninstalling will only happen at the end of the billing cycle (once a month)
     *
     * @return \Illuminate\View\View
     */
    public function cancel()
    {
        return view('app/cancel');
    }

}
