export default class AnimationHandler {
    burgerMenu: HTMLElement | null;
    header: HTMLElement | null;

    popup: HTMLElement | null;
    popupHiddenClass: string;


    themeCheckbox: HTMLInputElement | null;

    constructor() {
        // Burger Menu
        this.burgerMenu = document.querySelector(".header__burger");
        this.header = document.querySelector(".header");

        // Popup
        this.popup = document.querySelector(".popup");
        this.popupHiddenClass ='popup--hidden';

        // Theme setup
        this.themeCheckbox = document.querySelector("#dark-mode");
    }

    init() {
        this.toggleBurgerMenu();
        this.setupTheme();
        this.setupPopup();
    }

    setupPopup() {

        setTimeout(() => {
            if (!this.popup) return
            this.popup.classList.add(this.popupHiddenClass);
        }, 3000);

        setTimeout(() => {
            if (!this.popup) return
            this.popup.style.display = 'none';
        }, 3500);
    }

    toggleBurgerMenu() {
        if (!this.burgerMenu) return;

        this.burgerMenu.addEventListener("click", () => {
            if (!this.burgerMenu) return;
            const currentState = this.burgerMenu.getAttribute("data-state");

            if (!currentState || currentState === "closed") {
                this.burgerMenu.setAttribute("data-state", "opened");
                this.burgerMenu.setAttribute("aria-expanded", "true");
            } else {
                this.burgerMenu.setAttribute("data-state", "closed");
                this.burgerMenu.setAttribute("aria-expanded", "false");
            }
        });

        document.addEventListener("click", (e) => {
            const targetElement = e.target as HTMLElement;
            if (!this.header) return;

            if (!this.header.contains(targetElement)) {
                if (!this.burgerMenu) return;

                this.burgerMenu.setAttribute("data-state", "closed");
                this.burgerMenu.setAttribute("aria-expanded", "false");
            }
        });
    }

    // Theme setup

    setupTheme() {
        if (!this.themeCheckbox) return;
        this.checkThemePreference();
        this.applySavedTheme();
        this.themeCheckbox.addEventListener("change", () => {
            const selectedTheme = this.themeCheckbox?.checked
                ? "dark"
                : "light";
            localStorage.setItem("theme", selectedTheme);
            this.applyTheme(selectedTheme);
        });
    }

    // Theme setup helpers

    applyTheme(selectedTheme: string) {
        if (!this.themeCheckbox) return;
        if (selectedTheme === "dark") {
            document.body.setAttribute("data-theme", "dark");
            this.themeCheckbox.checked = true;
        } else {
            document.body.setAttribute("data-theme", "light");
            this.themeCheckbox.checked = false;
        }
    }

    checkThemePreference() {
        if (!this.themeCheckbox) return;
        const prefersDarkScheme = window.matchMedia(
            "(prefers-color-scheme: dark)"
        ).matches;

        if (prefersDarkScheme) {
            this.themeCheckbox.checked = true;
        }
    }

    applySavedTheme() {
        if (!this.themeCheckbox) return;
        const savedTheme = localStorage.getItem("theme") || "light";
        this.applyTheme(savedTheme);
    }
}
