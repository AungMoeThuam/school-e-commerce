<style>
    a {
        cursor: pointer;
        margin: 2px !important;
    }

    a:hover {
        background-color: black;
        color: white !important;

        text-decoration: none;

        border-radius: 4px;
    }
</style>
<div class="col-2 p-0 mt-2 shadow-sm">

    <h4 class=" bg-dark text-light p-2">
        Admin Panel
    </h4>

    <div class="border p-2 d-flex flex-column">
        <a id="navLink" class=" nav-link text-dark" href="./users.php">Customers</a>
        <a id="navLink" class=" nav-link text-dark" href="./products.php">Products</a>
        <a id="navLink" class=" nav-link text-dark" href="./orders.php">Orders</a>
        <a id="navLink" class=" nav-link text-dark" href="./profile.php">Profile</a>
        <h6 id="logoutBtn" class=" btn btn-warning"> Logout</h6>

    </div>
</div>
<script>
    let logoutBtn = document.querySelector("#logoutBtn");
    logoutBtn.addEventListener("click", () => {
        confirm("Do you confirm to logout?") ? location.href = "http://localhost/e-commerce/actions/logoutAction.php" : "";
    })
</script>