
fetch('getSessionData.php')
.then(response => response.json())
.then(data => {
    console.log("User ID from session:", data.value_user_id);
})
.catch(error => console.error("Error fetching session data:", error));
    