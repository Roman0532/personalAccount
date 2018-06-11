/*
	By Osvaldas Valutis, www.osvaldas.info
	Available for use under the MIT License
*/
;( function (document) {
    var inputs = document.querySelectorAll('.inputfile');
    Array.prototype.forEach.call(inputs, function (input) {
        var label = input.nextElementSibling,
            labelVal = label.innerHTML;

        input.addEventListener('change', function (e) {
            var fileName = e.target.value.split('\\').pop();

            if (fileName)
                if (fileName.length > 10) {
                    label.querySelector('span').innerHTML = fileName.substring(0, 10).fontcolor('red') + '&hellip;' + '</br>';
                } else if (fileName.length < 10) {
                    label.querySelector('span').innerHTML = fileName.fontcolor('red') + '</br>';
                }
                else
                    label.innerHTML = labelVal;
        });

        // Firefox bug fix
        input.addEventListener('focus', function () {
            input.classList.add('has-focus');
        });
        input.addEventListener('blur', function () {
            input.classList.remove('has-focus');
        });
    });
}(document, window, 0));