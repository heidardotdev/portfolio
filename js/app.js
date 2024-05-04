// Select Elements && Variables
const navToggleIcon = document.querySelector('.nav__toggle-icon');
const menu = document.querySelector('.menu');
const cover = document.querySelector('.cover');
const resumeListItems = document.querySelectorAll('.resume-list__item');
const portfolioListItems = document.querySelectorAll('.portfolio-list__item');
const menuItems = document.querySelectorAll('.menu__item');
const sections = document.querySelectorAll("main > section");
const changeThemeBtn = document.querySelector(".change-theme");
const darkThemeIcon = `<svg viewBox="0 0 24 24"><path d="M12.3,4.9c0.4-0.2,0.6-0.7,0.5-1.1S12.2,3,11.7,3C6.8,3.1,3,7.1,3,12c0,5,4,9,9,9c3.8,0,7.1-2.4,8.4-5.9c0.2-0.4,0-0.9-0.4-1.2c-0.4-0.3-0.9-0.2-1.2,0.1c-1,0.9-2.3,1.4-3.7,1.4c-3.1,0-5.7-2.5-5.7-5.7C9.4,7.8,10.5,5.9,12.3,4.9zM15.1,17.4c0.5,0,1,0,1.4-0.1C15.3,18.4,13.7,19,12,19c-3.9,0-7-3.1-7-7c0-2.5,1.4-4.8,3.5-6c-0.7,1.1-1,2.4-1,3.8C7.4,14,10.9,17.4,15.1,17.4z"/></svg>`;
const lightThemeIcon = `<svg viewBox="0 0 24 24"><path d="M7 12c0 2.8 2.2 5 5 5s5-2.2 5-5-2.2-5-5-5S7 9.2 7 12zM12 9c1.7 0 3 1.3 3 3s-1.3 3-3 3-3-1.3-3-3S10.3 9 12 9zM13 5V3c0-.6-.4-1-1-1s-1 .4-1 1v2c0 .6.4 1 1 1S13 5.6 13 5zM19.1 4.9c-.4-.4-1-.4-1.4 0l-1.4 1.4c-.4.4-.4 1 0 1.4.2.2.5.3.7.3s.5-.1.7-.3l1.4-1.4C19.5 6 19.5 5.3 19.1 4.9zM21 11h-2c-.6 0-1 .4-1 1s.4 1 1 1h2c.6 0 1-.4 1-1S21.6 11 21 11zM17.7 16.2c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.4 1.4c.2.2.5.3.7.3s.5-.1.7-.3c.4-.4.4-1 0-1.4L17.7 16.2zM11 19v2c0 .6.4 1 1 1s1-.4 1-1v-2c0-.6-.4-1-1-1S11 18.4 11 19zM4.9 19.1c.2.2.5.3.7.3s.5-.1.7-.3l1.4-1.4c.4-.4.4-1 0-1.4s-1-.4-1.4 0l-1.4 1.4C4.5 18 4.5 18.7 4.9 19.1zM2 12c0 .6.4 1 1 1h2c.6 0 1-.4 1-1s-.4-1-1-1H3C2.4 11 2 11.4 2 12zM6.3 4.9c-.4-.4-1-.4-1.4 0s-.4 1 0 1.4l1.4 1.4C6.5 8 6.8 8.1 7.1 8.1S7.6 8 7.8 7.8c.4-.4.4-1 0-1.4L6.3 4.9z"/></svg>`;

if (window.localStorage.getItem("theme") === "dark-theme"){
    document.documentElement.classList.add("dark-theme")
    changeThemeBtn.innerHTML = lightThemeIcon
}


// Intersection Observer
const observer = new IntersectionObserver(observerHandler, {threshold: 0.5});
function observerHandler(allSections) {
    allSections.map(section => {
        let sectionClassName = section.target.className;
        let sectionMenuItem = document.querySelector(`.menu__item[data-section=${sectionClassName}]`);
        if (section.isIntersecting) {
            sectionMenuItem.classList.add("menu__item--active");
        } else {
            sectionMenuItem.classList.remove("menu__item--active");
        }
    })
}


// - Custom Functions -
function navigationTabsInit(listItems, listItemActiveClass, contentItemShowClass) {
    listItems.forEach(listItem => {
        listItem.addEventListener('click', function () {
            removeActiveClass(listItemActiveClass);
            removeActiveClass(contentItemShowClass);
            this.classList.add(listItemActiveClass);
            let contentId = this.getAttribute('data-content-id');
            document.querySelector(contentId).classList.add(contentItemShowClass);
        })
    })
}
function removeActiveClass(className) {
    document.querySelector(`.${className}`).classList.remove(className);
}


// App Navigation Tabs Setting up
navigationTabsInit(resumeListItems, 'resume-list__item--active', 'resume-content--show');
navigationTabsInit(portfolioListItems, 'portfolio-list__item--active', 'portfolio-content--show');


// Event Listeners
navToggleIcon.addEventListener('click', function () {
    this.classList.toggle('nav__toggle-icon--open');
    menu.classList.toggle('menu--open');
    cover.classList.toggle('cover--show');
})
changeThemeBtn.addEventListener("click", function () {
    document.documentElement.classList.toggle("dark-theme")
    if (document.documentElement.classList.contains("dark-theme")) {
        window.localStorage.setItem("theme", "dark-theme")
        this.innerHTML = lightThemeIcon;
    } else {
        window.localStorage.setItem("theme", "light-theme")
        this.innerHTML = darkThemeIcon;
    }
})


// Loops
sections.forEach(section => {
    observer.observe(section);
})
menuItems.forEach(item => {
    item.addEventListener("click", function (e) {
        e.preventDefault();
        removeActiveClass('menu__item--active');
        item.classList.add("menu__item--active");

        let sectionClass = item.getAttribute("data-section");
        let sectionOffsetTop = document.querySelector(`.${sectionClass}`).offsetTop;

        window.scrollTo({
            top: sectionOffsetTop - 130,
            behavior: "smooth"
        });
    })
})





                                // Selecting elements from the DOM
                                const titlePen = document.getElementById('titlePen');
                                const titleDel = document.getElementById('titleDel');
                                const saveTitleText = document.getElementById('saveTitleText');
                                const homeTitleColor = document.getElementById('titleColor');
                                const titleEditTextbox = document.querySelector('.title-edit-text-box');
                                const homeTitle = document.querySelector('.home__title');
                                const titleText = document.getElementById('titleText');

                                // Function to toggle the title edit text box display
                                function toggleTitleEditTextbox(displayStyle) {
                                    titleEditTextbox.style.display = displayStyle;
                                }

                                // Event listener for the title pen icon
                                titlePen.addEventListener('click', function () {
                                    toggleTitleEditTextbox('flex'); // Show the title edit text box
                                    titleText.value = homeTitle.textContent; // Pre-fill the input with the current title
                                    titleText.style.color = homeTitle.style.color; // Set the input text color to match the title
                                });

                                // Event listener for the save button
                                saveTitleText.addEventListener('click', function () {
                                    homeTitle.textContent = titleText.value; // Save the new title
                                    toggleTitleEditTextbox('none'); // Hide the title edit text box
                                });

                                // Event listener for the title delete icon
                                titleDel.addEventListener('click', function () {
                                    homeTitle.textContent = ''; // Delete the title
                                    toggleTitleEditTextbox('flex'); // Show the title edit text box for new input
                                });

                                // Event listener for the title color picker
                                homeTitleColor.addEventListener('input', function () {
                                    homeTitle.style.color = homeTitleColor.value; // Change the title color
                                });







// Get the elements from the DOM
const pen = document.getElementById('pen');
const del = document.getElementById('del');
const saveNameText = document.getElementById('saveNameText');
const homeNameColor = document.getElementById('homeNameColor');
const editTextbox = document.querySelector('.edit-text-box');
const homeNameUsername = document.querySelector('.home__name-username');
const nameText = document.getElementById('nameText');

// Function to toggle the edit text box display
function toggleEditTextbox(displayStyle) {
    editTextbox.style.display = displayStyle;
}

// Event listener for the pen icon
pen.addEventListener('click', function () {
    toggleEditTextbox('flex');
    nameText.value = homeNameUsername.textContent;
    nameText.style.color = homeNameUsername.style.color;
});

// Event listener for the save button
saveNameText.addEventListener('click', function () {
    homeNameUsername.textContent = nameText.value;
    toggleEditTextbox('none');
});

// Event listener for the delete icon
del.addEventListener('click', function () {
    homeNameUsername.textContent = '';
    toggleEditTextbox('flex');
});

// Event listener for the color picker
homeNameColor.addEventListener('input', function () {
    homeNameUsername.style.color = homeNameColor.value;
});

 <script>
                                // Selecting elements from the DOM
                                const titlePen = document.getElementById('titlePen');
                                const titleDel = document.getElementById('titleDel');
                                const saveTitleText = document.getElementById('saveTitleText');
                                const homeTitleColor = document.getElementById('titleColor');
                                const titleEditTextbox = document.querySelector('.title-edit-text-box');
                                const homeTitle = document.querySelector('.home__title');
                                const titleText = document.getElementById('titleText');

                                // Function to toggle the title edit text box display
                                function toggleTitleEditTextbox(displayStyle) {
                                    titleEditTextbox.style.display = displayStyle;
                                }

                                // Event listener for the title pen icon
                                titlePen.addEventListener('click', function () {
                                    toggleTitleEditTextbox('flex'); // Show the title edit text box
                                    titleText.value = homeTitle.textContent; // Pre-fill the input with the current title
                                    titleText.style.color = homeTitle.style.color; // Set the input text color to match the title
                                });

                                // Event listener for the save button
                                saveTitleText.addEventListener('click', function () {
                                    homeTitle.textContent = titleText.value; // Save the new title
                                    toggleTitleEditTextbox('none'); // Hide the title edit text box
                                });

                                // Event listener for the title delete icon
                                titleDel.addEventListener('click', function () {
                                    homeTitle.textContent = ''; // Delete the title
                                    toggleTitleEditTextbox('flex'); // Show the title edit text box for new input
                                });

                                // Event listener for the title color picker
                                homeTitleColor.addEventListener('input', function () {
                                    homeTitle.style.color = homeTitleColor.value; // Change the title color
                                });


                            </script>







document.getElementById('navLogo').addEventListener('change', function (event) {
    var imgElement = document.querySelector('.nav__logo').nextElementSibling; // Reference to your <img> element

    // Check if a file was selected
    if (event.target.files.length > 0) {
        // Get the file path and set it as the src of the image
        var src = URL.createObjectURL(event.target.files[0]);
        imgElement.src = src;

        // Set the display of the image to inline-block
        imgElement.style.display = 'inline-block';

        // Clear the text of the nav__logo
        document.querySelector('.nav__logo').textContent = '';
    } else {
        // If no file is selected, set the display of the image to none
        imgElement.style.display = 'none';
    }
});
document.getElementById('navLogo').addEventListener('change', function (event) {
    // Check if a file was selected
    if (event.target.files.length > 0) {
        // Get the file path
        var filePath = URL.createObjectURL(event.target.files[0]);

        // Set the href attribute of the favicon link element
        var linkElement = document.querySelector('link[rel="icon"]');
        if (linkElement) {
            linkElement.href = filePath;
        }
    }
});



