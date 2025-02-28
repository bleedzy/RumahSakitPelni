import $ from 'jquery';
$(document).on('click', '[data-modal-toggle]', function(event) {
    let $modal = $('#' + $(this).attr('data-modal-toggle'));
    $modal.attr('data-modal-visible', (_, attr) => (attr == 'false' ? 'true' : 'false'));
})

$(document).on('click', '[data-modal-visible]', function(event) {
    if (event.target == this) {
        $(this).attr('data-modal-visible', 'false');
    }
})