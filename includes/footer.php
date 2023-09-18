</main>
</body>
<script>
    function logOut(event){
        event.preventDefault();
        if(confirm('Voulez-vous vous déconnecter?')){
            window.location.href = './logout.php';
        }
    }
</script>
</html>