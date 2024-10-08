import './bootstrap';

import AnimationHandler from './modules/animation';

document.addEventListener('DOMContentLoaded', () => {
    const animation = new AnimationHandler;
    animation.init();
})

