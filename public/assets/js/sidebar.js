let sideBar = document.querySelector('.side-menu');
let btnExpandirSideBarOpen = document.querySelector('.sidebar-open');
let btnExpandirSideBarClose = document.querySelector('.sidebar-close');

btnExpandirSideBarOpen.addEventListener('click', () => openSideBar())
btnExpandirSideBarClose.addEventListener('click', () => closeSideBar());

function openSideBar()
{
    sideBar.style.visibility = 'visible';
}

function closeSideBar()
{
    sideBar.style.visibility = 'hidden';
}