<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

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
     * This url is called when a SEOshop customer installs this application
     *
     * @return \Illuminate\View\View
     */
    public function install()
    {
        return view('app/install');
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
