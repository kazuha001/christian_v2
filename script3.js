
document.getElementById("submit").addEventListener("submit", function(event) {

    event.preventDefault()
    const formData = new FormData(this)
    
    fetch("updateF1.php", {
        
        method: 'POST',
        body: formData
    
    })

    alert("Submited Sucessfully")

    window.location.href = "retrieve.php"

})
