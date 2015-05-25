# Highligh our code
hljs.initHighlightingOnLoad()

# Make our code expandable
$('pre').each ->
  if ($(this).height() == 250)
    parent = $(this).parent()
    button = $('<a href="#" class="more">Show more</a>')

    parent.append button

$(document).on 'click', '.more', (event) ->
  # Disable default behavior
  event.preventDefault()

  # Find our code
  target = $(this).parent().find('pre')
  handle = $(this)

  # Toggle
  if target.height() == 250
    target.css 'max-height', 'none'
    handle.text 'Show less'
  else
    target.css 'max-height', 250
    handle.text 'Show more'