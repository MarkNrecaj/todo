import "./bootstrap";

import Alpine from "alpinejs";

import Choices from "choices.js";

window.choices = (element) => {
    return new Choices(element, {
        maxItemCount: 3,
        removeItemButton: true,
    });
};

window.Alpine = Alpine;

Alpine.start();
