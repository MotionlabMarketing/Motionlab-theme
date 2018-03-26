/**
 * ACCORDIONS WITH COLLECTIONS.
 * This function opens and closes the accordions menus based on there collection allow multiple blocks to be include
 * on the page.
 *
 * @author  Joe Curran
 * @created 22 Mar 2018
 */

jQuery(document).ready(function ($) {

    // OPEN AND CLOSE ACCORDION COLLECTIONS.
    $('[ data-accordion-collection]').on('click', function() {

        // GET THE NUMBER OF THE ROW COLLECTION.
        var collecton = $(this).data('accordion-collection');
        var selector = '[data-accordion-collection="' + collecton + '"]';


        // IF THE ITEM CLICKED IS NOT ALREADY OPEN.
        if (!$(this).hasClass('toggle-open')) {

            // ALL ITEMS IN COLLECTION.
            $(selector).removeClass('toggle-open').find('i').removeClass('fa-angle-up').addClass('fa-angle-down');
            $(selector).attr('data-accordion-active', false);
            $(selector).find('.content').slideUp();

            // CLICKED ITEM.
            $(this).addClass('toggle-open').find('i').toggleClass('fa-angle-up fa-angle-down');
            $(this).attr('data-accordion-active', true);
            $(this).find('.content').slideToggle();
        } else {
            $(this).removeClass('toggle-open').find('i').toggleClass('fa-angle-down fa-angle-up');
            $(this).attr('data-accordion-active', false);
            $(this).find('.content').slideUp();
        }

    });

});