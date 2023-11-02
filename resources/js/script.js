const navLinkEls = document.querySelectorAll('.nav-link');
const windowPathName = window.location.pathname;

navLinkEls.forEach(navLinkEl => {
    const navLinkPathName = new URL(navLinkEl.href).pathname;

    if ((windowPathName === navLinkPathName)){
        navLinkEl.classList.add('active');
    }
});