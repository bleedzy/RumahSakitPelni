import $ from 'jquery';
$(() => {
    $('[data-sidebar-dropdown]').on('click', function (event) {
        if (!$(event.target).closest('[data-sidebar-dropdown-toggle]')[0]) {
            return;
        }
        $(this).find('svg').toggleClass('rotate-180')
        let $sideBarDropdownItems = $(this).find('[data-sidebar-dropdown-items]')
        $sideBarDropdownItems.toggleClass('!max-h-[500px] opacity-30');
        if ($sideBarDropdownItems.hasClass('opacity-30')) {
            $sideBarDropdownItems.find('a').attr('tabindex', -1);
        } else {
            $sideBarDropdownItems.find('a').attr('tabindex', 0);
        }
    })
    $('[data-sidebar-dropdown-items] a').attr('tabindex', -1);
    $('[data-sidebar-item]').removeClass('opacity-0');
    let $activeSideBarDropdownItems = $('.sidebar-item-active').closest('[data-sidebar-dropdown-items]');
    $activeSideBarDropdownItems.find('a').attr('tabindex', 0);
    $activeSideBarDropdownItems.toggleClass('!max-h-[500px] opacity-30 transition-none');
    $activeSideBarDropdownItems.prev().find('svg').toggleClass('rotate-180');
    setTimeout(() => {
        $activeSideBarDropdownItems.toggleClass('transition-none');
        $('.sidebar-item-active').get(0).scrollIntoView({
            block: 'center',
            inline: 'nearest'
        });
    }, 1);
})