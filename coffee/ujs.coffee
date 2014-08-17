###
# Traq
# Copyright (C) 2009-2014 Traq.io
# Copyright (C) 2009-2014 Jack Polgar
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
###

$(document).ready ->
  doc = $(document)

  # Popover confirmation
  # $('[data-confirm]').each ->/
  doc.on 'click', '[data-confirm]', (event) ->
    event.preventDefault()

    href = $(this).attr('href')
    window.traq.popoverConfirm $(this), $(this).attr('data-confirm'), ->
      window.location.href = href

  # Popover confirmation for remote action
  doc.on 'click', '[data-ajax-confirm]', (event) ->
    event.preventDefault()

    href = $(this).attr('href')
    window.traq.popoverConfirm $(this), $(this).attr('data-ajax-confirm'), ->
      $.ajax url: href, dataType: 'script'

  # Ajax based on elements `href` attribute
  doc.on 'click', '[data-ajax=1]', (event) ->
    $.ajax url: $(this).attr('href'), dataType: 'script'
    event.preventDefault()

  # Autocomplete
  doc.on 'focus', '[data-autocomplete]', ->
    $(this).autocomplete source: $(this).attr('data-autocomplete')

  # Overlay
  doc.on 'click', '[data-overlay]', (event) ->
    event.preventDefault()
    window.traq.overlay $(this)
