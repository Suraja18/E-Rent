// const navbar = document.getElementById('navigations');
// window.onscroll = function () {
//     scrollFunction()
// }
// function scrollFunction() {
//     if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
//         navbar.classList.add('inSticky')
//     } else {
//         navbar.classList.remove('inSticky')

//     }
// }

//Start Index Hero Banners
document.addEventListener("DOMContentLoaded", function () {
    const slides = document.querySelectorAll(".heroBannerSlides");
    if (slides.length > 0) {
        let currentSlide = 0;
        function showSlide(index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.style.display = "block";
                } else {
                    slide.style.display = "none";
                }
            });
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        showSlide(currentSlide);

        setTimeout(() => {
            nextSlide();
            setInterval(nextSlide, 9500);
        }, 500);
    }




    //Start Down and Up Arrow
    document.querySelectorAll('.nav-header-bar').forEach(function (navHeaderBar) {
        if (navHeaderBar) {
            navHeaderBar.addEventListener('click', function () {
                var navId = this.dataset.navId;
                var navContentsOpen = document.querySelector('.nav-contents[data-nav-id="' + navId + '"]');
                var expandArrows = document.querySelector('.arrowDown[data-nav-id="' + navId + '"]');

                if (expandArrows && navContentsOpen) {
                    expandArrows.classList.toggle('rotate180');
                    navContentsOpen.classList.toggle('open');
                }
            });
        }
    });


    //Start navbar options
    const burgerMenu = document.getElementById('burger-menu');
    if (burgerMenu) {
        burgerMenu.addEventListener('click', function () {
            this.classList.toggle('open');
            const mobileNavPanel = document.getElementById('mobileNavPanel');
            if (mobileNavPanel) {
                mobileNavPanel.classList.toggle('open');
            }
        });
    }

    //Start FQS + and -
    $(document).ready(function () {
        $(".FAQS-title-question").click(function () {
            $(this).next(".question-content-answer").toggleClass("content-is-active");
            $(this).find(".question-plus-icon").find(".Question-toggle-closed, .Question-toggle-open").toggle();
        });
    });

    //About Read more Buttons
    const readMoreButton = document.getElementById('readMore');

    if (readMoreButton) {
        readMoreButton.addEventListener('click', function () {
            const expandHistory = document.querySelector('.expand-history');
            const expandActions = document.querySelector('.expands-action');
            const readMoreBtn = document.querySelector('.read-more-btn');
            const downArrow = document.getElementById('downArrowIcon');

            if (expandHistory) {
                if (expandHistory.style.height === '100%') {
                    expandHistory.style.height = '6rem';
                    readMoreBtn.style.opacity = '1';
                    expandActions.style.opacity = '1';
                    readMoreBtn.style.display = 'block';
                    downArrow.style.display = 'block';
                } else {
                    expandHistory.style.height = '100%';
                    readMoreBtn.style.opacity = '0';
                    expandActions.style.opacity = '0';
                    readMoreBtn.style.display = 'none';
                    downArrow.style.display = 'none';
                }
            }
        });
    }



    // About Us Page Infinity Photo Loop


    let currentLeftSlide = 0;
    let currentRightSlide = 0;
    const slidesLeft = document.querySelectorAll(".infinity-photo-content.left-slide-images");
    const slidesRight = document.querySelectorAll(".infinity-photo-content.right-slide-images");


    if (slidesLeft.length > 0 && slidesRight.length > 0) {
        function showSlide(slides, index) {
            slides.forEach((slide, i) => {
                if (i === index) {
                    slide.style.opacity = 1;
                } else {
                    slide.style.opacity = 0;
                }
            });
        }

        function nextAboutSlides() {
            currentLeftSlide = (currentLeftSlide + 1) % slidesLeft.length;
            showSlide(slidesLeft, currentLeftSlide);

            currentRightSlide = (currentRightSlide + 1) % slidesRight.length;
            showSlide(slidesRight, currentRightSlide);
        }

        showSlide(slidesLeft, currentLeftSlide);

        setTimeout(() => {
            nextAboutSlides();
            setInterval(nextAboutSlides, 2500);
        }, 500);
    }


    // Pagination and All Housing List

    const itemsPerPage = 24;
    const housingGrid = document.getElementById("housingGridList");
    const paginationContainer = document.getElementById("paginationContainer");


    let currentPage = 1;
    const previousPage = document.getElementById("previousPage");
    const nextPage = document.getElementById("nextPage");

    if (housingGrid && paginationContainer && previousPage && nextPage) {
        const housingItems = Array.from(housingGrid.querySelectorAll(".housing-grid-list-items"));
        const totalPages = Math.ceil(housingItems.length / itemsPerPage);
        previousPage.addEventListener("click", function () {
            if (currentPage > 1) {
                displayPage(currentPage - 1);
            }
        });

        nextPage.addEventListener("click", function () {
            const currentPage = getCurrentPage();
            if (currentPage < totalPages) {
                displayPage(currentPage + 1);
            }
        });

        for (let i = 1; i <= totalPages; i++) {
            const pageLink = document.createElement("span");
            pageLink.classList.add("page-link");
            pageLink.textContent = i;
            pageLink.addEventListener("click", function () {
                displayPage(i);
            });
            paginationContainer.insertBefore(pageLink, nextPage);
        }
        displayPage(1);
        function getCurrentPage() {
            const activePageLink = paginationContainer.querySelector(".active");
            return activePageLink ? parseInt(activePageLink.textContent) : 1;
        }

        function displayPage(pageNumber) {
            housingGrid.innerHTML = "";
            const startIndex = (pageNumber - 1) * itemsPerPage;
            const endIndex = pageNumber * itemsPerPage;
            for (let i = startIndex; i < endIndex && i < housingItems.length; i++) {
                const housingItem = housingItems[i].cloneNode(true);
                housingGrid.appendChild(housingItem);
            }
            highlightActivePage(pageNumber);
            currentPage = pageNumber;
        }

        function highlightActivePage(pageNumber) {
            const pageLinks = document.querySelectorAll(".page-link");
            pageLinks.forEach(link => link.classList.remove("active"));
            const activePageLink = pageLinks[pageNumber];
            if (activePageLink) {
                activePageLink.classList.add("active");
            }
        }
    }



    //Smooth Scroll
    var links = document.querySelectorAll('a[href^="#"]');

    links.forEach(function (link) {
        link.addEventListener('click', function (e) {
            e.preventDefault();

            var targetId = this.getAttribute('href').substring(1);
            var targetElement = document.getElementById(targetId);

            if (targetElement) {
                var offsetTop = targetElement.offsetTop;

                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });


    // Role Sliders
    const slidersWrapper = document.querySelector('.whole-sliders.for-slide-role');
    const cards = document.querySelectorAll('.sliders-card.for-slide-role');

    if (slidersWrapper && cards.length > 0) {
        const cardWidth = cards[0].offsetWidth;
        let currentIndex = 0;

        document.querySelector('.slider-left-arrows').addEventListener('click', function () {
            if (currentIndex > 0) {
                currentIndex--;
                updateSlider();
            }
        });

        document.querySelector('.slider-right-arrows').addEventListener('click', function () {
            const maxIndex = cards.length - 1;
            if (currentIndex < maxIndex) {
                currentIndex++;
                updateSlider();
            }
        });

        function updateSlider() {
            cards.forEach((card, index) => {
                card.classList.toggle('active', index === currentIndex);
            });

            const newPosition = -currentIndex * cardWidth;
            slidersWrapper.style.transform = `translateX(${newPosition}px)`;
        }
    }


    //Profile Mainly
    const avatarButtonOpen = document.getElementById('profileAvatarButton');
    const avatarProfileOpen = document.getElementById('profileAvatarOpen');
    if (avatarButtonOpen && avatarProfileOpen) {
        avatarButtonOpen.addEventListener('click', function () {
            avatarProfileOpen.classList.toggle('active');
        });
    }


    // Toggle More Options for Maintenance
    const btnMaintainanceIcons = document.querySelectorAll('.btn-more-option');
    const btnMaintainanceIconOptions = document.querySelectorAll('.more-info-for-maintainance');

    btnMaintainanceIcons.forEach((btnMaintainanceIcon, index) => {
        const btnMaintainanceIconOption = btnMaintainanceIconOptions[index];
        btnMaintainanceIcon.addEventListener('click', function () {
            btnMaintainanceIconOption.classList.toggle('active');
        });
    });


    //Toggle Status Mainly
    const statusFullWrapper = document.getElementById('statusFullWrapper');
    const statusFullOption = document.getElementById('statusFullOption');

    if (statusFullWrapper && statusFullOption) {
        statusFullWrapper.addEventListener('click', function () {
            statusFullOption.classList.toggle('active');
        });
        document.getElementById('statusApply').addEventListener('click', function () {
            var selectedStatus = document.getElementById('multiScrollSelect').value;
            var statusSpan = document.getElementById('insideTheBox');
            statusSpan.innerHTML = '<span class="mr-5p">Status</span><span class="status-filters fw-600">' + selectedStatus + '</span>';
            var successMessage = document.getElementById('successStatusChange');
            successMessage.style.display = 'block';
            setTimeout(function () {
                successMessage.style.display = 'none';
            }, 5 * 60 * 1000);
        });

    }


    //More Options Mainly
    const navMoreButton = document.getElementById('navMoreButton');
    const navMoreOptions = document.getElementById('navMoreOptions');
    if (navMoreButton && navMoreOptions) {

        const svg1 = '<svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 448 512"><path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z"/></svg>';
        const svg2 = '<svg xmlns="http://www.w3.org/2000/svg" height="28" width="35" viewBox="0 0 384 512"><path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/></svg>';
        let toggle = false;

        navMoreButton.addEventListener('click', function () {
            toggle = !toggle;
            if (toggle) {
                navMoreButton.innerHTML = svg2 + '<p class="small-text">More</p>';
            } else {
                navMoreButton.innerHTML = svg1 + '<p class="small-text">More</p>';
            }
            navMoreOptions.classList.toggle('active');
            navMoreButton.classList.toggle('active');
        });
    }



    //Maintainance Request

    const categoryRadios = document.querySelectorAll('input[type="radio"][name^="115"]');

    if (categoryRadios) {
        categoryRadios.forEach(function (radio) {
            const secondCategoryLists = document.querySelector('.wizard-steps.is-second');
            const thirdCategoryLists = document.querySelector('.wizard-steps.is-third');
            const lastCategoryLists = document.querySelector('.wizard-steps.is-fourth');
            const wizardStepImage = document.getElementById('wizardStepImage');
            const wizardStepDescription = document.getElementById('wizardStepDescription');
            const wizardStepAddress = document.getElementById('wizardStepAddress');
            const wizardStepPiority = document.getElementById('wizardStepPiority');
            secondCategoryLists.classList.remove('active');
            thirdCategoryLists.classList.remove('active');
            lastCategoryLists.classList.remove('active');
            wizardStepImage.classList.remove('active');
            wizardStepDescription.classList.remove('active');
            wizardStepAddress.classList.remove('active');
            wizardStepPiority.classList.remove('active');
            const subFormCategoryLists = document.querySelectorAll('.sub-form-category-list.is-sec');
            const subFormSubCategoryLists = document.querySelectorAll('.sub-form-category-list.is-third');
            const subFormLastCategoryLists = document.querySelectorAll('.sub-form-category-list.is-ls');
            radio.addEventListener('change', function () {
                const selectedCategory = this.id.replace('category', '').toLowerCase();

                subFormCategoryLists.forEach(function (subForm) {
                    if (subForm.classList.contains(`is-${selectedCategory}`)) {
                        subForm.classList.add('active');
                        secondCategoryLists.classList.add('active');
                        secondCategoryLists.scrollIntoView({ behavior: "smooth" });
                        const subcategoryRadios = document.querySelectorAll('input[type="radio"][name^="116"]');
                        subcategoryRadios.forEach(function (radio1) {
                            thirdCategoryLists.classList.remove('active');
                            lastCategoryLists.classList.remove('active');
                            wizardStepImage.classList.remove('active');
                            wizardStepDescription.classList.remove('active');
                            wizardStepAddress.classList.remove('active');
                            wizardStepPiority.classList.remove('active');
                            radio1.addEventListener('change', function () {
                                const selectedSubCategory = this.id.replace('category', '').toLowerCase();
                                subFormSubCategoryLists.forEach(function (subForm1) {
                                    if (subForm1.classList.contains(`is-${selectedSubCategory}`)) {
                                        thirdCategoryLists.classList.add('active');;
                                        subForm1.classList.add('active');
                                        thirdCategoryLists.scrollIntoView({ behavior: "smooth" });
                                        const thirdCategoryRadios = document.querySelectorAll('input[type="radio"][name^="117"]');
                                        thirdCategoryRadios.forEach(function (radio2) {
                                            lastCategoryLists.classList.remove('active');
                                            wizardStepImage.classList.remove('active');
                                            wizardStepDescription.classList.remove('active');
                                            wizardStepAddress.classList.remove('active');
                                            wizardStepPiority.classList.remove('active');
                                            radio2.addEventListener('change', function () {
                                                const selectedThirdCategory = this.id.replace('category', '').toLowerCase();
                                                subFormLastCategoryLists.forEach(function (subForm2) {
                                                    if (subForm2.classList.contains(`is-${selectedThirdCategory}`)) {
                                                        lastCategoryLists.classList.add('active');;
                                                        subForm2.classList.add('active');
                                                        lastCategoryLists.scrollIntoView({ behavior: "smooth" });
                                                        const forthCategoryRadios = document.querySelectorAll('input[type="radio"][name^="lastdetail"]');
                                                        forthCategoryRadios.forEach(function (radio3) {
                                                            wizardStepDescription.classList.remove('active');
                                                            wizardStepAddress.classList.remove('active');
                                                            wizardStepPiority.classList.remove('active');
                                                            radio3.addEventListener('change', function () {
                                                                wizardStepImage.classList.add('active');
                                                                wizardStepImage.scrollIntoView({ behavior: "smooth" });
                                                                const nextBtnForReq = document.getElementById("nextBtnForReq");
                                                                nextBtnForReq.addEventListener('click', function () {
                                                                    wizardStepDescription.classList.add('active');
                                                                    wizardStepDescription.scrollIntoView({ behavior: "smooth" });
                                                                    wizardStepAddress.classList.remove('active');
                                                                    wizardStepPiority.classList.remove('active');
                                                                    const continueBtnForReq = document.getElementById("continueBtnForReq");
                                                                    continueBtnForReq.addEventListener('click', function () {
                                                                        wizardStepAddress.classList.add('active');
                                                                        wizardStepAddress.scrollIntoView({ behavior: "smooth" });
                                                                        wizardStepPiority.classList.remove('active');
                                                                        const nextBtnForLocation = document.getElementById("nextBtnForLocation");
                                                                        nextBtnForLocation.addEventListener('click', function () {
                                                                            wizardStepPiority.classList.add('active');
                                                                            wizardStepPiority.scrollIntoView({ behavior: "smooth" });
                                                                        });
                                                                    });
                                                                });
                                                            });
                                                        });
                                                    } else {
                                                        subForm2.classList.remove('active');
                                                    }
                                                });
                                            });
                                        });
                                    } else {
                                        subForm1.classList.remove('active');
                                    }
                                });
                            });
                        });
                    } else {
                        subForm.classList.remove('active');
                    }
                });
            });
        });
    }


    //Show More 
    const fixMoreButton = document.getElementById('fixMoreButton');
    const mDotsPopUp = document.getElementById('mDotsPopUp');

    if (fixMoreButton && mDotsPopUp) {
        fixMoreButton.addEventListener("click", function () {
            mDotsPopUp.classList.toggle('active');
        });
    }



    //Change Status
    const sectionChangeOptionsUhead = document.getElementById('sectionChangeOptionsUhead');
    const sectionChangeOptionsUbody = document.getElementById('sectionChangeOptionsUbody');

    if (sectionChangeOptionsUhead && sectionChangeOptionsUbody) {
        const btnCancelled = document.getElementById('btnCancelled');
        sectionChangeOptionsUhead.addEventListener("click", function () {
            sectionChangeOptionsUbody.classList.toggle('active');
        });
        btnCancelled.addEventListener("click", function () {
            sectionChangeOptionsUbody.classList.remove('active');
        });

    }
    const btnStatusClicked = document.getElementById('btnStatusClicked');
    const sectionChangeOptionsUpperbody = document.getElementById('sectionChangeOptionsUpperbody');

    if (btnStatusClicked && sectionChangeOptionsUpperbody) {
        const btnCancel = document.getElementById('btnCancel');
        btnStatusClicked.addEventListener("click", function () {
            sectionChangeOptionsUpperbody.classList.toggle('active');
        });
        btnCancel.addEventListener("click", function () {
            sectionChangeOptionsUpperbody.classList.remove('active');
        });

    }


    $(document).ready(function () {
        $('.help-center-item input[type="radio"]').on('change', function () {
            var target = $(this).attr('id').replace('Role', 'HelpCenter');
            $('#' + target).addClass('active').siblings('section').removeClass('active');
        });
    });



    //Now For Landlord Sidebar dropdown

    function DropdownToggle(dropdownId, arrowId, containerId) {
        const dropdownSidebarClick = document.getElementById(dropdownId);
        if (dropdownSidebarClick) {
            const sidebarDownArrow = document.getElementById(arrowId);
            const sidebarContainer = document.getElementById(containerId);
            dropdownSidebarClick.addEventListener("click", function () {
                sidebarDownArrow.classList.toggle('rotate180');
                sidebarContainer.classList.toggle('active');
            });
        }
    }
    DropdownToggle('dropdownmaintenance', 'expandArrow-maintenance', 'sidebarDropdown-maintenance');
    DropdownToggle('dropdownproperty', 'expandArrow-property', 'sidebarDropdown-property');
    DropdownToggle('dropdownpropertyoccupant', 'expandArrow-propertyoccupant', 'sidebarDropdown-propertyoccupant');
    DropdownToggle('dropdowntenants', 'expandArrow-tenants', 'sidebarDropdown-tenants');
    DropdownToggle('dropdownreport', 'expandArrow-report', 'sidebarDropdown-report');


    //More Click for Landlord
    const appSidebar = document.getElementById('appSidebar');
    const specialContainer = document.getElementById('landlordBody');
    if (appSidebar && specialContainer) {
        const viewMoreLinks = this.getElementById('viewMoreLinks');
        viewMoreLinks.addEventListener("click", function () {
            appSidebar.classList.toggle('menu-click');
            specialContainer.classList.toggle('menu-click');
        });
    }



    //For Notifications
    const notifyButtons = document.getElementById('notifyButtons');
    const notifyCOntainers = document.getElementById('notifyCOntainers');
    if(notifyButtons && notifyCOntainers){
        notifyButtons.addEventListener('click',function(){
            notifyCOntainers.classList.toggle('active');
        });
    } 

});








// External Js



