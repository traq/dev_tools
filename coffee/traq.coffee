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

window.traq =
  # URI to traq root directory
  uri: ''

  # Load ticket template from remote
  loadTicketTemplate: ->
    typeId = $("#type_id option:selected").val()

    $("#description").load window.traq.uri + '/_ajax/ticket_template/' + typeId

    @updateTicketCustomFields()

  # Update ticket form to show and/or hide custom form fields
  updateTicketCustomFields: ->
    typeId = $("#type_id option:selected").val()

    $(".properties .custom_field").each ->
      field = $(this)

      if field.hasClass('field-for-type-0') or field.hasClass('field-for-type' + typeId)
        field.show()
      else
        field.hide()

  # Load overlay content and show
  overlay: (element) ->
    if element.attr('data-overlay') == '1'
      uri = element.attr('href')
    else
      uri = element.attr('data-overlay')

    $.ajax
      url: uri
      type: "GET"
      headers:
        'x-overlay': true
      success: (data) ->
        $('#overlay').html data

        if element.attr('data-target')?
          modal = $(element.attr('data-target'))
        else
          modal = $('#overlay .modal')

        modal.modal('show')

  # Popover confirmation
  # TODO: Turn this into a library and clean it up
  popoverConfirm: (element, message, callback) ->
    element.on 'click', (e) -> e.preventDefault()

    content = '<div class="text-center"><div class="btn-group">' +
                '<button class="btn btn-sm btn-primary popover-btn-confirm">' +
                  '<i class="fa fa-check"></i> ' +
                  window.traq.locale.confirm.yes +
                '</button>' +
                '<button class="btn btn-sm btn-default popover-btn-cancel">' +
                  '<i class="fa fa-times"></i> ' +
                  window.traq.locale.confirm.no +
                '</button>' +
              '</div></div>'

    element.popover
      title     : message
      content   : content
      html      : true
      placement : 'bottom'
      trigger   : 'click focus'

    $(document).on 'shown.bs.popover', (event) ->
      link    = $(event.target)
      popover = link.next()

      # Confirmed
      popover.find('.popover-btn-confirm').one 'click', ->
        callback()
        popover.popover 'hide'

      # Cancelled
      popover.find('.popover-btn-cancel').one 'click', ->
        popover.popover 'hide'
