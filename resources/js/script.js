const navLinkEls = document.querySelectorAll('.nav-link-verifikasi');
const windowPathName = window.location.pathname;

navLinkEls.forEach(navLinkEl => {
    const navLinkPathName = new URL(navLinkEl.href).pathname;

    if (windowPathName === navLinkPathName) {
        navLinkEl.classList.add('active');
    }

});


const navLinkEls2 = document.querySelectorAll('.nav-link');
const windowPathName2 = window.location.pathname;

navLinkEls2.forEach(navLinkEl2 => {
    const navLinkPathName2 = new URL(navLinkEl2.href).pathname;

    if (windowPathName2 === navLinkPathName2) {
        navLinkEl2.classList.add('active');
    }
});

    // console.log(`windowPathName: ${windowPathName2}, navLinkPathName: ${navLinkPathName2}`);

