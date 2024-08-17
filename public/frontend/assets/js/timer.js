document.addEventListener('DOMContentLoaded', function () {
    const services = document.querySelectorAll('.single-service[data-target-date]');
    
    services.forEach((service, index) => {
        const targetDateStr = service.getAttribute('data-target-date');
        const targetDate = new Date(targetDateStr).getTime();
        
        const updateCountdown = () => {
            const now = new Date().getTime();
            let distance = targetDate - now;

            if (distance < 0) {
                service.querySelector('.countdown-timer').innerHTML = "Completed";
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            distance -= days * 1000 * 60 * 60 * 24;
            const hours = Math.floor(distance / (1000 * 60 * 60));
            distance -= hours * 1000 * 60 * 60;
            const minutes = Math.floor(distance / (1000 * 60));
            distance -= minutes * 1000 * 60;
            const seconds = Math.floor(distance / 1000);

            document.getElementById(`days-${index}`).textContent = days;
            document.getElementById(`hours-${index}`).textContent = hours;
            document.getElementById(`minutes-${index}`).textContent = minutes;
            document.getElementById(`seconds-${index}`).textContent = seconds;
        };

        updateCountdown();
        setInterval(updateCountdown, 1000);
    });
});