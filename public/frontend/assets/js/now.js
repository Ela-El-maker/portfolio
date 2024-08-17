document.addEventListener('DOMContentLoaded', function () {
    const service = document.querySelector('.single-service');
    const targetDateStr = service.getAttribute('data-target-date');
    const targetDate = new Date(targetDateStr).getTime();
    
    const updateCountdown = () => {
        const now = new Date().getTime();
        let distance = targetDate - now;

        if (distance < 0) {
            service.querySelector('.countdown-timer').textContent = "Completed";
            return;
        }

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        distance -= days * 1000 * 60 * 60 * 24;
        const hours = Math.floor(distance / (1000 * 60 * 60));
        distance -= hours * 1000 * 60 * 60;
        const minutes = Math.floor(distance / (1000 * 60));
        distance -= minutes * 1000 * 60;
        const seconds = Math.floor(distance / 1000);

        const daysElem = service.querySelector('.days');
        const hoursElem = service.querySelector('.hours');
        const minutesElem = service.querySelector('.minutes');
        const secondsElem = service.querySelector('.seconds');

        if (daysElem) daysElem.textContent = days;
        if (hoursElem) hoursElem.textContent = hours;
        if (minutesElem) minutesElem.textContent = minutes;
        if (secondsElem) secondsElem.textContent = seconds;
    };

    updateCountdown();
    setInterval(updateCountdown, 1000);
});
