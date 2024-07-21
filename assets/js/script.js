$(document).ready(function () {
    if ($('.code-box').length > 0) {
        $('.code-box').on('input', function () {
            let nextBox = $(this).next('.code-box');
            if (nextBox.length && $(this).val().length) {
                nextBox.focus();
            }
        });

        $('.code-box').on('keydown', function (e) {
            let prevBox = $(this).prev('.code-box');
            if (e.key === "Backspace" && !$(this).val().length && prevBox.length) {
                prevBox.focus();
            }
        });

        $('.code-box').on('paste', function (e) {
            let pasteData = e.originalEvent.clipboardData.getData('text');
            pasteData = pasteData.slice(0, 6); // limit to 6 characters
            $('.code-box').each(function (index) {
                $(this).val(pasteData[index] || '');
                if (index < pasteData.length) {
                    $(this).next('.code-box').focus();
                }
            });
        });
    }
})