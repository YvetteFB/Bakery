<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" integrity="sha384-wESLQ85D6gbsF459vf1CiZ2+rr+CsxRY0RpiF1tLlQpDnAgg6rwdsUF1+Ics2bni" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="/app/scss/style.css">

    <script src="/app/js/previewImages.js" defer></script>
    <script src="/app/js/script.js" defer></script>
    <script src="/app/js/tab.js" defer></script>
    <script src="/app/js/table.js" defer></script>
    <script src="/app/js/toggleMenu.js" defer></script>
    <script src="/app/js/cart.js" defer></script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

        html {
            width: 100%;
        }

        body {
            overflow-x: hidden;
        }

        .button {
            padding: .6rem 1rem;
            background-color: crimson;
            border-radius: 2px;
            cursor: pointer;
            outline: none;
            color: white;
            font-weight: 600;
            border: none;
        }

        .content-table img {
            width: 100px;
            height: 100px;
        }

        .admin__container {
            position: relative;
            width: 100%;
        }

        .navigation {
            position: fixed;
            width: 300px;
            height: 100%;
            background: white;
            transition: 0.5s;
            overflow: hidden;
        }

        .navigation.active {
            width: 60px;
        }

        a {
            text-decoration: none;
            color: #111;
        }

        td img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .logo__button {
            display: flex;
            align-items: center;
            border: none;
            background-color: crimson;
        }

        .tabs__button {
            background: transparent;
            outline: none;
            border: none;
            width: 100%;
            display: flex;
            align-items: center;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
        }

        .navigation button {
            position: relative;
            width: 100%;
        }

        .navigation .tabs__button:hover {
            background: grey;
        }


        .navigation .icon {
            position: relative;
            display: block;
            min-width: 60px;
            height: 60px;
            line-height: 60px;
            text-align: center;
        }

        .navigation .icon .fa {
            color: #111;
            font-size: 24px;
        }

        .navigation .title {
            position: relative;
            display: block;
            padding: 0 10px;
            height: 60px;
            line-height: 60px;
            white-space: normal;
            color: #111;
        }

        .main {
            position: absolute;
            width: calc(100% - 300px);
            left: 300px;
            min-height: 100vh;
            transition: 0.5s;
        }

        .main.active {
            width: calc(100% - 60px);
            left: 60px;
        }

        .main .top-bar {
            width: 100%;
            background: #fff;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
        }

        .toggle {
            position: relative;
            width: 60px;
            height: 60px;
            cursor: pointer;
        }

        .toggle span i {
            position: absolute;
            width: 100%;
            height: 100%;
            line-height: 60px;
            font-size: 24px;
            text-align: center;
            color: #111;
        }

        @media screen and (max-width: 1000px) {
            .main {
                width: calc(100% - 60px);
                left: 60px;
            }

            .navigation {
                width: 60px;
            }

            .main.active {
                width: calc(100% - 300px);
                left: 300px;
            }

            .navigation.active {
                width: 300px;
            }
        }

        [data-tab-content] {
            display: none;
        }

        .active[data-tab-content] {
            display: block;
            padding: 2em;
        }

        .tabs__button.active {
            background: grey;
            border-right: #fff;
        }

        .content-table {
            border-collapse: collapse;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            margin: auto;
            box-shadow: 0 10px 6px -6px #777;
        }

        .content-table thead tr {
            background-color: crimson;
            color: #ffffff;
            text-align: left;
            font-weight: bold;
        }

        .content-table th,
        .content-table td {
            padding: 12px 15px;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        i {
            padding-right: 5px;
            cursor: pointer;
        }

        .cars__table {
            margin-bottom: 10em;
        }

        form {
            margin-left: 10%;
            width: 100%;
            margin-bottom: 1em;
        }

        .form {
            width: 200px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .form input {
            width: 100%;
            height: 30px;
            border: 1px solid black;
            border-radius: 5px;
            outline: none;
            cursor: pointer;
            padding: 2px;
            caret-color: teal;
        }

        .form__section {
            
            width: 500px;
            margin: auto;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        #add {
            display: flex;
            justify-content: center;
            margin-top: 2em;
        }

        #previews {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            grid-auto-rows: 200px;
            grid-auto-flow: dense;
            gap: 5px;
        }

        #previews img {
            max-width: 200px;
            height: 100%;
            object-fit: cover;
        }

        input[type='file'] {
            display: none;
        }

        #imagesLabel {
            color: #fff;
            height: 60px;
            width: 250px;
            background: crimson;
            margin-top: 4em;
            margin-bottom: 2em;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .uploadImages {
            margin-bottom: 3em;
        }

        .edit-form {
            display: none;
        }

        .label-name {
            font-weight: 500;
        }
    </style>
    <title>Admin Dashboard</title>
</head>

<body style="background-color: rgb(233, 233, 233);">
    <div class="admin__container">
        <div class="navigation">

            <button style="pointer-events: none;" class="logo__button">
                <img src="images/logo-removebg-preview.png" alt="" style="filter: brightness(0) invert(); width: 50px;">
                <span class="title">
                    <h2>Sweet Tooth</h2>
                </span>
            </button>

            <button data-tab-target=".tab1" class="active tabs__button">
                <span class="icon"><i class="fa fa-car" aria-hidden="true"></i></span>
                <span class="title">Products</span>
            </button>

            <button data-tab-target=".tab3" class="tabs__button">
                <span class="icon"><i class="fas fa fa-plus"></i></i></span>
                <span class="title">Add new</span>
            </button>

            <button data-tab-target=".tab2" class="tabs__button">
                <span class="icon"><i class="fas fa fa-shopping-cart"></i></span>
                <span class="title">Orders</span>
            </button>



        </div>
        <div class="main">
            <div class="top-bar">
                <div class="toggle" onclick="toggleMenu();">
                    <span> <i class="fa fa-bars" aria-hidden="true"></i> </span>
                </div>
                <h2 style="color: black;">Dashboard</h2>
            </div>
            <div class="tab-content">
                <div class='active tab1' data-tab-content>
                    <h3>Products Listed</h3>
                    <div class="products__table">
                        <table class="content-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "Fiona", "sweettooth");
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT idproduct, productName, productPrice, productImage FROM products;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<td>" . $row["idproduct"] . "</td>
                                          <td>" . $row["productName"] . "</td>
                                          <td>" . $row["productPrice"] . "</td>
                                          <td> <img src= 'php/productImages/" . $row['productImage'] . "' width = '70px' height = '70px'/></td>        
                                          </tr>";
                                }
                            }
                            $conn->close();
                            ?>
                        </table>
                    </div>

                </div>
                <div class='tab2' data-tab-content>
                    <h2>Orders</h2>
                    <table class="order content-table">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Address</th>
                                <th>Delivery Date</th>
                                <th>Product Name</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn = mysqli_connect("localhost", "root", "Fiona", "sweettooth");
                            // Check connection
                            if ($conn->connect_error) {
                                die("Connection failed: " . $conn->connect_error);
                            }
                            $sql = "SELECT idorder, name, email, phNumber, address, delDate, productName, amount FROM sweettooth.order;";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                // output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<td>" . $row["idorder"] . "</td>
                                          <td>" . $row["name"] . "</td>
                                          <td>" . $row["email"] . "</td>
                                          <td>" . $row["phNumber"] . "</td>
                                          <td>" . $row["address"] . "</td>
                                          <td>" . $row["delDate"] . "</td>
                                          <td>" . $row["productName"] . "</td>
                                          <td>" . $row["amount"] . "</td>
                                        </tr>";
                                }
                            }
                            $conn->close();
                            ?>

                        </tbody>
                    </table>
                </div>
                <div class='tab3' data-tab-content>
                    <h2>Add new product</h2>
                    <p>Fill in the fields</p>
                    <div class=" form__section">
                        <form action="php/products.php" method="post" enctype="multipart/form-data" class="newEntry">
                            <div class="form">
                                <label for="name" class="label-name">
                                    Name
                                </label>
                                <input type="text" name="name" placeholder=" " id="name" />
                            </div>
                            <div class="form">
                                <label for="price" class="label-name">
                                    Price
                                </label>
                                <input type="text" name="price" placeholder=" " id="price" />
                            </div>
                            <div class="uploadImages">
                                <input type="file" id="images" name="image" style="width: 200px;">
                                <label for="images" id="imagesLabel">
                                    <i class="fas fa-upload"></i>Upload photo
                                </label>
                                <div id="previews"></div>
                            </div>

                            <input type="submit" name="submit" class="button" value="Submit Entry">
                        </form>

                    </div>

                </div>

            </div>

        </div>
    </div>
    <script type="text/Javascript">
        const edit = document.querySelectorAll('.fa-edit');
    const erase = document.querySelectorAll('.fa-trash-alt');
    var table = document.querySelector('.content-table'), rIndex;
    var selectedRow = null;
    var rows = document.querySelector('.content-table').getElementsByTagName('tbody')[0].getElementsByTagName('tr');
      
    
        for(var i = 0; i < table.rows.length; i++)
        {
           try{
              var x = rows[i].insertCell(-1);
              x.innerHTML =
             `
              <i class="fas fa-trash-alt" id="fa-trash-alt"></i>`;
            }catch(e){
              console.log(e.message)   ;
            }
        }
      for(var i = 0; i < table.rows.length; i++){
          document.addEventListener('click',function(e){
            if(e.target && e.target.id=='fa-trash-alt'){
            for (i = 0; i < rows.length; i++) {
              rows[i].onclick = function() {
              selectedRow = (this.rowIndex);
              table.deleteRow(selectedRow);
              }    
            }
          }
        });
      }
    function toggleMenu(){
    let toggle = document.querySelector('.toggle');
    let navigation = document.querySelector('.navigation');
    toggle.classList.toggle('active');
    navigation.classList.toggle('active');
    let main = document.querySelector('.main');
    main.classList.toggle('active');
}
        const tabs = document.querySelectorAll('[data-tab-target]')
      const tabContents = document.querySelectorAll('[data-tab-content]')

      tabs.forEach(tab => {
        tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.tabTarget)
        tabContents.forEach(tabContent => {
        tabContent.classList.remove('active')
        })
        tabs.forEach(tab => {
        tab.classList.remove('active')
        })
        tab.classList.add('active')
        target.classList.add('active')
        })
       })
       const input = document.getElementById('images');

if(input){
    input.addEventListener('change', () => {
        previewImages(input);
    })
}

const previewImages = (input) => {
    let counter = 0;
    while(counter < input.files.length){
    if(input.files && input.files[counter]){
        const reader = new FileReader();
        reader.onload = (event) => {
            const imgPath = event.currentTarget.result;
            const previews = document.getElementById('previews');
            const img = `<img class = "img-preview" src = "${imgPath}">`
            previews.insertAdjacentHTML('beforeend', img)
        }
        reader.readAsDataURL(input.files[counter]);
        counter += 1;
    }
    }
}

    var orderTable = document.querySelector('.order'), rIndex;
    var row = document.querySelector('.order').getElementsByTagName('tbody')[0].getElementsByTagName('tr');

    

    
    </script>
</body>