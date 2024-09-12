document.addEventListener('DOMContentLoaded',function(){
    const Pages = document.getElementById('Pages');

    Pages.addEventListener('change',function(){
        window.location.href=Pages.value;
    });
});