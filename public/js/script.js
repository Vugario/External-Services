(function() {
  hljs.initHighlightingOnLoad();

  $('pre').each(function() {
    var button, parent;
    if ($(this).height() === 250) {
      parent = $(this).parent();
      button = $('<a href="#" class="more">Show more</a>');
      return parent.append(button);
    }
  });

  $(document).on('click', '.more', function(event) {
    var handle, target;
    event.preventDefault();
    target = $(this).parent().find('pre');
    handle = $(this);
    if (target.height() === 250) {
      target.css('max-height', 'none');
      return handle.text('Show less');
    } else {
      target.css('max-height', 250);
      return handle.text('Show more');
    }
  });

}).call(this);

//# sourceMappingURL=script.js.map