<script>
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/serviceworker.js')
            .then(() => console.log("Service Worker Registered"))
            .catch(error => console.error("Service Worker Registration Failed:", error));
    }
</script>