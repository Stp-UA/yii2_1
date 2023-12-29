document.addEventListener("DOMContentLoaded", function () {
    const button = document.querySelector('.send-ajax');
    if (button) {
        button.addEventListener('click', sendRequest);
    }

    function sendRequest() {
        const lang = document.querySelector('html').getAttribute('lang');
        const formData = new FormData();
        formData.append("min", 10);
        formData.append("max", 100);

        fetch('/' + lang + '/ajax/t1', {
            method: "POST",
            body: formData,
        })
            .then(response => response.json())
            .then(response => {
                console.log(response);
            })
    }
});
