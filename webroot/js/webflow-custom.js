$(document).ready(function() {
    $('.message').on('click', function() {
        $(this).fadeOut();
    });
})


// Custom Transitions that are meant to overwrite Webflow's
Webflow.require('ix').init([
    { "slug": "filter-hideshow", "name": "Filter Hide/Show", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".filter-bar", "preserve3d": true, "stepsA": [{ "display": "block" }, { "transition": "transform 500ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [{ "transition": "transform 500ms ease 0", "x": "-300px", "y": "0px", "z": "0px" }, { "display": "none" }] }, { "type": "click", "selector": ".column", "stepsA": [{ "transition": "transform 500ms ease 0", "left": "300px" }], "stepsB": [{ "transition": "transform 500ms ease 0", "left": "0px" }] }] } },
    { "slug": "add-mobile-showhide-2", "name": "Add (Mobile- Show/Hide 2", "value": { "style": {}, "triggers": [{ "type": "scroll", "selector": ".button-paw", "preserve3d": true, "stepsA": [{ "transition": "transform 300ms ease-in 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [{ "transition": "transform 300ms ease-in 0", "x": "0px", "y": "180%", "z": "0px" }] }] } },
    { "slug": "search-mobile", "name": "Search (mobile", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".brand-cont", "stepsA": [{ "wait": "200ms", "opacity": 0, "transition": "opacity 200 ease 0" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".navbar-search-icon-mobile", "stepsA": [{ "wait": "200ms", "opacity": 0, "transition": "opacity 200 ease 0" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".navbar-search-cont", "preserve3d": true, "stepsA": [{ "wait": "200ms", "display": "none", "opacity": 0, "x": "0px", "y": "0px", "z": "0px" }, { "display": "block", "opacity": 1, "transition": "opacity 400ms ease 0" }], "stepsB": [] }, { "type": "click", "selector": ".navbar-search-exit", "stepsA": [{ "wait": "200ms", "display": "none", "opacity": 0 }, { "display": "block", "opacity": 1, "transition": "opacity 400ms ease 0" }], "stepsB": [] }] } },
    { "slug": "search-bar-exit", "name": "Search-bar exit", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".navbar-search-cont", "preserve3d": true, "stepsA": [{ "opacity": 0, "transition": "transform 300ms ease 0, opacity 300ms ease 0", "x": "120%", "y": "0px", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".navbar-search-exit", "stepsA": [{ "opacity": 0 }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".brand-cont", "stepsA": [{ "wait": "300ms" }, { "display": "block" }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [] }, { "type": "click", "selector": ".navbar-search-icon-mobile", "stepsA": [{ "wait": "300ms" }, { "display": "flex" }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [] }] } },
    { "slug": "add-click", "name": "Add click", "value": { "style": {}, "triggers": [{ "type": "click", "stepsA": [{ "width": "50px", "transition": "transform 150ms ease 0, width 150ms ease 0", "x": "0px", "y": "0px", "z": "0px" }, { "width": "55px", "transition": "transform 150ms ease 0, width 150ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }] } },
    { "slug": "paw-click", "name": "paw- click", "value": { "style": {}, "triggers": [{ "type": "click", "stepsA": [{ "width": "55px", "height": "55px", "transition": "transform 150ms ease 0, width 150ms ease 0, height 150ms ease 0", "x": "0px", "y": "0px", "z": "0px" }, { "width": "60px", "height": "60px", "transition": "transform 150ms ease 0, width 150ms ease 0, height 150ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }, { "type": "click", "selector": ".floating-overlay", "stepsA": [{ "display": "flex", "opacity": 1, "transition": "opacity 500ms ease 0" }], "stepsB": [{ "opacity": 0, "transition": "opacity 500ms ease 0" }, { "display": "none" }] }, { "type": "click", "selector": ".button-01", "preserve3d": true, "stepsA": [{ "display": "none", "x": "0px", "y": "200%", "z": "0px" }, { "display": "block", "transition": "transform 500ms ease 0", "x": "0px", "y": "0%", "z": "0px" }], "stepsB": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "200%", "z": "0px" }, { "display": "none" }] }, { "type": "click", "selector": ".button-02", "preserve3d": true, "stepsA": [{ "display": "none", "x": "0px", "y": "300%", "z": "0px" }, { "display": "block", "transition": "transform 500ms ease 0", "x": "0px", "y": "0%", "z": "0px" }], "stepsB": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "300%", "z": "0px" }, { "display": "none" }] }, { "type": "click", "selector": ".button-03", "preserve3d": true, "stepsA": [{ "display": "none", "x": "0px", "y": "500%", "z": "0px" }, { "display": "block", "transition": "transform 500ms ease 0", "x": "0px", "y": "0%", "z": "0px" }], "stepsB": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "500%", "z": "0px" }, { "display": "none" }] }, { "type": "click", "selector": ".button-04", "preserve3d": true, "stepsA": [{ "display": "none", "x": "0px", "y": "700%", "z": "0px" }, { "display": "block", "transition": "transform 500ms ease 0", "x": "0px", "y": "0%", "z": "0px" }], "stepsB": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "700%", "z": "0px" }, { "display": "none" }] }, { "type": "click", "selector": ".button-cont", "stepsA": [{ "display": "block" }], "stepsB": [{ "wait": "299ms" }, { "display": "none" }] }] } },
    { "slug": "delete-click", "name": "delete-click", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".button-01", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "200%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-02", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "300%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-03", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "500%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-04", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "700%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-cont", "stepsA": [{ "wait": "499ms" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".confirm-cont", "stepsA": [{ "display": "flex", "opacity": 0 }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [] }, { "type": "click", "selector": ".button-paw", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "300%", "z": "0px" }, { "display": "none" }], "stepsB": [] }] } },
    { "slug": "upload-click", "name": "upload-click", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".button-01", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "200%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-02", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "300%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-03", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "500%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-04", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "700%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-cont", "stepsA": [{ "wait": "499ms" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".upload-cont", "stepsA": [{ "display": "block", "opacity": 0 }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [] }, { "type": "click", "selector": ".button-paw", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "300%", "z": "0px" }, { "display": "none" }], "stepsB": [] }] } },
    { "slug": "filter-click", "name": "filter-click", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".button-01", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "200%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-02", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "300%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-03", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "500%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-04", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "700%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-cont", "stepsA": [{ "wait": "499ms" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-paw", "preserve3d": true, "stepsA": [{ "transition": "transform 500ms ease 0", "x": "0px", "y": "300%", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".filter-bar", "stepsA": [{ "display": "block", "opacity": 0 }, { "opacity": 1, "transition": "opacity 500ms ease 0" }], "stepsB": [] }] } },
    { "slug": "filter-cancel", "name": "filter-cancel", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".floating-overlay", "stepsA": [{ "opacity": 0, "transition": "opacity 500ms ease 0" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-paw", "preserve3d": true, "stepsA": [{ "display": "flex", "x": "0px", "y": "300%", "z": "0px" }, { "transition": "transform 500ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }, { "type": "click", "selector": ".filter-bar", "stepsA": [{ "opacity": 0, "transition": "opacity 300ms ease 0" }, { "display": "none" }], "stepsB": [] }] } },
    { "slug": "delete-click-desktop", "name": "delete-click desktop", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".confirm-cont", "stepsA": [{ "display": "block", "opacity": 0 }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [] }, { "type": "click", "selector": ".floating-overlay", "stepsA": [{ "display": "flex" }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [] }] } },
    { "slug": "upload-click-desktop", "name": "upload-click desktop", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".upload-cont", "stepsA": [{ "display": "block", "opacity": 0 }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [] }, { "type": "click", "selector": ".floating-overlay", "stepsA": [{ "display": "flex" }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [] }] } },
    { "slug": "confirm-cancel", "name": "confirm-cancel", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".confirm-cont", "stepsA": [{ "opacity": 0, "transition": "opacity 300ms ease 0" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".floating-overlay", "stepsA": [{ "opacity": 0, "transition": "opacity 500ms ease 0" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-paw", "preserve3d": true, "stepsA": [{ "display": "flex", "x": "0px", "y": "300%", "z": "0px" }, { "transition": "transform 500ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }] } },
    { "slug": "upload-cancel", "name": "upload-cancel", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".upload-cont", "stepsA": [{ "opacity": 0, "transition": "opacity 300ms ease 0" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".floating-overlay", "stepsA": [{ "opacity": 0, "transition": "opacity 500ms ease 0" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".button-paw", "preserve3d": true, "stepsA": [{ "display": "flex", "x": "0px", "y": "300%", "z": "0px" }, { "transition": "transform 500ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }] } },
    { "slug": "home-button-click", "name": "home-button-click", "value": { "style": {}, "triggers": [{ "type": "click", "stepsA": [{ "transition": "transform 150ms ease 0", "x": "0px", "y": "0px", "z": "0px" }, { "transition": "transform 150ms ease 0", "x": "0px", "y": "-5px", "z": "0px" }], "stepsB": [] }] } },
    { "slug": "overview-notification", "name": "overview-notification", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".notify-cont", "preserve3d": true, "stepsA": [{ "x": "0px", "y": "100px", "z": "0px" }, { "wait": "1s", "display": "flex", "transition": "transform 300ms ease 0", "x": "0px", "y": "-65px", "z": "0px" }, { "transition": "transform 300ms ease 0", "x": "0px", "y": "100px", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-overview", "stepsA": [{ "wait": "1300ms", "display": "block" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-foster", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-medical", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-more", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-adopter", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-attachments", "stepsA": [{ "display": "none" }], "stepsB": [] }] } },
    { "slug": "adopter-notification", "name": "adopter-notification", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".notify-cont", "preserve3d": true, "stepsA": [{ "x": "0px", "y": "100px", "z": "0px" }, { "wait": "1s", "display": "flex", "transition": "transform 300ms ease 0", "x": "0px", "y": "-65px", "z": "0px" }, { "transition": "transform 300ms ease 0", "x": "0px", "y": "100px", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-adopter", "stepsA": [{ "wait": "1300ms", "display": "block" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-foster", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-medical", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-more", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-overview", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-attachments", "stepsA": [{ "display": "none" }], "stepsB": [] }] } },
    { "slug": "foster-notification", "name": "foster-notification", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".notify-cont", "preserve3d": true, "stepsA": [{ "x": "0px", "y": "100px", "z": "0px" }, { "wait": "1s", "display": "flex", "transition": "transform 300ms ease 0", "x": "0px", "y": "-65px", "z": "0px" }, { "transition": "transform 300ms ease 0", "x": "0px", "y": "100px", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-foster", "stepsA": [{ "wait": "1300ms", "display": "block" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-overview", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-medical", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-more", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-adopter", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-attachments", "stepsA": [{ "display": "none" }], "stepsB": [] }] } },
    { "slug": "medical-notification", "name": "medical-notification", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".notify-cont", "preserve3d": true, "stepsA": [{ "x": "0px", "y": "100px", "z": "0px" }, { "wait": "1s", "display": "flex", "transition": "transform 300ms ease 0", "x": "0px", "y": "-65px", "z": "0px" }, { "transition": "transform 300ms ease 0", "x": "0px", "y": "100px", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-medical", "stepsA": [{ "wait": "1300ms", "display": "block" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-foster", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-overview", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-more", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-adopter", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-attachments", "stepsA": [{ "display": "none" }], "stepsB": [] }] } },
    { "slug": "attachment-notification", "name": "attachment-notification", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".notify-cont", "preserve3d": true, "stepsA": [{ "x": "0px", "y": "100px", "z": "0px" }, { "wait": "1s", "display": "flex", "transition": "transform 300ms ease 0", "x": "0px", "y": "-65px", "z": "0px" }, { "transition": "transform 300ms ease 0", "x": "0px", "y": "100px", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-attachments", "stepsA": [{ "wait": "1300ms", "display": "block" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-foster", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-medical", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-more", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-adopter", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-overview", "stepsA": [{ "display": "none" }], "stepsB": [] }] } },
    { "slug": "more-notification", "name": "more-notification", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".notify-cont", "preserve3d": true, "stepsA": [{ "x": "0px", "y": "100px", "z": "0px" }, { "wait": "1s", "display": "flex", "transition": "transform 300ms ease 0", "x": "0px", "y": "-65px", "z": "0px" }, { "transition": "transform 300ms ease 0", "x": "0px", "y": "100px", "z": "0px" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-more", "stepsA": [{ "wait": "1300ms", "display": "block" }, { "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-foster", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-medical", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-overview", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-adopter", "stepsA": [{ "display": "none" }], "stepsB": [] }, { "type": "click", "selector": ".notify-attachments", "stepsA": [{ "display": "none" }], "stepsB": [] }] } },
    { "slug": "dropdown", "name": "dropdown", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".dropdown-results-cont", "siblings": true, "stepsA": [{ "display": "block", "height": "0px" }, { "height": "auto", "transition": "height 300ms ease 0" }], "stepsB": [{ "height": "0px", "transition": "height 300ms ease 0, transform 300ms ease 0" }, { "display": "none" }] }, { "type": "click", "selector": ".dropdown-icon", "descend": true, "preserve3d": true, "stepsA": [{ "transition": "transform 300ms ease 0", "rotateX": "0deg", "rotateY": "0deg", "rotateZ": "180deg" }], "stepsB": [{ "transition": "transform 300ms ease 0", "rotateX": "0deg", "rotateY": "0deg", "rotateZ": "0deg" }] }] } },
    { "slug": "page-load-fade-in", "name": "Page Load, Fade In", "value": { "style": { "opacity": 0 }, "triggers": [{ "type": "load", "stepsA": [{ "opacity": 1, "transition": "opacity 700ms ease 0" }], "stepsB": [] }] } },
    { "slug": "page-load-slide-down", "name": "Page Load, Slide Down", "value": { "style": { "x": "0px", "y": "-100%", "z": "0px" }, "triggers": [{ "type": "load", "stepsA": [{ "transition": "transform 700ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }] } },
    { "slug": "page-load-slide-right", "name": "Page Load, Slide Right", "value": { "style": { "x": "-100%", "y": "0px", "z": "0px" }, "triggers": [{ "type": "load", "stepsA": [{ "transition": "transform 700ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }] } },
    { "slug": "gender-switch", "name": "Gender Switch", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".gender-male", "siblings": true, "stepsA": [{ "opacity": 0, "transition": "opacity 300ms ease 0" }, { "display": "none" }], "stepsB": [{ "wait": "301ms" }, { "display": "block" }, { "opacity": 1, "transition": "opacity 300ms ease 0" }] }, { "type": "click", "selector": ".gender-female", "siblings": true, "stepsA": [{ "wait": "301ms" }, { "display": "block", "opacity": 0 }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [{ "opacity": 0, "transition": "opacity 300ms ease 0" }, { "display": "none" }] }] } },
    { "slug": "load-fade-in-elements-to-right", "name": "Load - Fade In Elements to Right", "value": { "style": { "opacity": 0, "x": "-40px", "y": "0px", "z": "0px" }, "triggers": [{ "type": "scroll", "offsetBot": "0%", "stepsA": [{ "opacity": 1, "transition": "transform 300ms ease 0, opacity 300ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }] } },
    { "slug": "button-switch-click", "name": "button-switch-click", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".underline-2", "stepsA": [{ "opacity": 0 }], "stepsB": [] }, { "type": "click", "selector": ".underline-2", "descend": true, "preserve3d": true, "stepsA": [{ "x": "0px", "y": "50px", "z": "0px" }, { "opacity": 1, "transition": "opacity 800ms ease 0, transform 500ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }] } },
    { "slug": "button-switch-click-2", "name": "button-switch-click 2", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".underline-1", "stepsA": [{ "opacity": 0 }], "stepsB": [] }, { "type": "click", "selector": ".underline-1", "descend": true, "preserve3d": true, "stepsA": [{ "x": "0px", "y": "50px", "z": "0px" }, { "opacity": 1, "transition": "opacity 800ms ease 0, transform 500ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [] }] } },
    { "slug": "tag-action-show-hide", "name": "tag-action (Show-Hide)", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".tag-actions-cont", "descend": true, "stepsA": [{ "max-width": "150px" }], "stepsB": [{ "max-width": "0px" }] }] } },
    { "slug": "medical-data-click", "name": "medical-data-click", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".medical-data-action-cont", "descend": true, "preserve3d": true, "stepsA": [{ "display": "flex" }, { "transition": "transform 300ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [{ "transition": "transform 300ms ease 0", "x": "250px", "y": "0px", "z": "0px" }, { "display": "none" }] }] } }, { "slug": "profile-notification-expand", "name": "profile-notification-expand", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".profile-add-symbol", "descend": true, "preserve3d": true, "stepsA": [{ "transition": "transform 300ms ease 0", "rotateX": "0deg", "rotateY": "0deg", "rotateZ": "180deg" }], "stepsB": [{ "transition": "transform 300ms ease 0", "rotateX": "0deg", "rotateY": "0deg", "rotateZ": "0deg" }] }] } },
    { "slug": "new-interaction", "name": "New Interaction", "value": { "style": {}, "triggers": [{ "type": "scroll", "stepsA": [], "stepsB": [] }] } },
    { "slug": "event-show-hide-upcoming", "name": "event-show-hide upcoming", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".event", "siblings": true, "stepsA": [{ "wait": "301ms" }, { "display": "block", "opacity": 0 }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [{ "opacity": 0, "transition": "opacity 300ms ease 0" }, { "display": "none" }] }, { "type": "click", "selector": ".events-action-cont", "descend": true, "preserve3d": true, "stepsA": [{ "display": "flex", "transition": "transform 300ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [{ "transition": "transform 300ms ease 0", "x": "250px", "y": "0px", "z": "0px" }, { "display": "none" }] }, { "type": "click", "selector": ".event-expand-icon", "descend": true, "preserve3d": true, "stepsA": [{ "transition": "transform 300ms ease 0", "rotateX": "0deg", "rotateY": "0deg", "rotateZ": "180deg" }], "stepsB": [{ "transition": "transform 300ms ease 0", "rotateX": "0deg", "rotateY": "0deg", "rotateZ": "0deg" }] }, { "type": "click", "selector": ".upcoming", "stepsA": [{ "opacity": 0, "transition": "opacity 300ms ease 0" }, { "display": "none" }], "stepsB": [{ "wait": "301ms" }, { "display": "flex", "opacity": 1, "transition": "opacity 300ms ease 0" }] }] } },
    { "slug": "event-show-hide-past", "name": "event-show-hide past", "value": { "style": {}, "triggers": [{ "type": "click", "selector": ".event", "siblings": true, "stepsA": [{ "wait": "301ms" }, { "display": "block", "opacity": 0 }, { "opacity": 1, "transition": "opacity 300ms ease 0" }], "stepsB": [{ "opacity": 0, "transition": "opacity 300ms ease 0" }, { "display": "none" }] }, { "type": "click", "selector": ".events-action-cont", "descend": true, "preserve3d": true, "stepsA": [{ "display": "flex", "transition": "transform 300ms ease 0", "x": "0px", "y": "0px", "z": "0px" }], "stepsB": [{ "transition": "transform 300ms ease 0", "x": "250px", "y": "0px", "z": "0px" }, { "display": "none" }] }, { "type": "click", "selector": ".event-expand-icon", "descend": true, "preserve3d": true, "stepsA": [{ "transition": "transform 300ms ease 0", "rotateX": "0deg", "rotateY": "0deg", "rotateZ": "180deg" }], "stepsB": [{ "transition": "transform 300ms ease 0", "rotateX": "0deg", "rotateY": "0deg", "rotateZ": "0deg" }] }, { "type": "click", "selector": ".past", "stepsA": [{ "opacity": 0, "transition": "opacity 300ms ease 0" }, { "display": "none" }], "stepsB": [{ "wait": "301ms" }, { "display": "flex", "opacity": 1, "transition": "opacity 300ms ease 0" }] }] } }
]);

