/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function () {
    const wordLimit = 100;

    // Truncate the description to 50 words and add "See More" button
    $('.description').each(function () {
        const words = $(this).text().trim().split(' ');
        if (words.length > wordLimit) {
            const truncatedText = words.slice(0, wordLimit).join(' ');
            const remainingText = words.slice(wordLimit).join(' ');
            $(this).data('remainingText', remainingText);
            $(this).text(truncatedText + '...');
            $(this).append('<button class="see-more-btn">See More</button>');
        }
    });

    // Show the rest of the description when the "See More" button is clicked
    $('.see-more-btn').on('click', function () {
        const description = $(this).prev('.description');
        const remainingText = description.data('remainingText');
        description.text(description.text() + ' ' + remainingText);
        $(this).remove();
    });
});


