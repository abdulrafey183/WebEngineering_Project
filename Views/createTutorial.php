<!DOCTYPE html>
<html>
    <head>
        <!-- Required Meta Tags-->
        <meta charset="UTF-8">
        <title>Create Tutorial</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--- CSS Link for Creat New Tutorials-->
        <link href="../assets/css/CreatTutorial.css" rel="stylesheet">

        <!-- CSS Link for Icons-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <!-- Left Fixed Sidebar-->
        <div class="sidenav">
            <img class="logo" src="https://www.concordia.ca/content/dam/common/icons/303x242/graduate-students.png" alt="logo">
            <br><br>
            <a href="/webproject"><i class="fa fa-home"></i> Home</a><br>
            <a href="about.php"><i class="fa fa-font"></i> About</a><br>
            <a href="login.php"><i class="fa fa-hand-o-left"></i> Profile</a><br>
            <a href="teacherLogout.php"><i class="fa fa-arrow-circle-right"></i> Logout</a>
        </div>
        
        <!-- Main Content-->
        <form>
        <div class="tut-bg">
            <div class="main-tut-header">
            <h1 id="tut-header">Create Tutorial</h1>
            </div>
            <br><br>
            <div>
            <label>Select a Category:</label>
            <div class="category-select-wrapper">
                <div class="category-select">
                    <div class="category-select__trigger"><span>Programming</span>
                        <div class="arrow"></div>
                    </div>
                    <div class="category-options">
                        <span class="category-option selected" data-value="programming">Programming</span>
                        <span class="category-option" data-value="arts">Arts</span>
                        <span class="category-option" data-value="maths">Maths</span>
                        <span class="category-option" data-value="biology">Biology</span>
                    </div>
                </div>
            </div>
            </div> 

            <div>
                <label>Title:</label>
                <input type="text" id="title" placeholder="Enter Title">
            </div>
            <br><br>

            <div>
                <label>Paragraph 1 Heading:</label>
                <input type="text" id="para-head" placeholder="Enter Heading">
                <br><br>
                <label id="content">Content:</label>
                <textarea id="para-content" placeholder="Enter Paragraph Content"></textarea>
            </div>
            <br><br><br><br>

            <div>
                <a id="add-para-btn" href="#">Add Another Paragraph</a><br>
                <a id="create-btn" href="#">Create</a>
            </div>
        </div>
        </form>
        
        <!-- Javascript Code for DropDown Menu -->
        <script>
            /* Added Click function to the wrapper */
            document.querySelector('.category-select-wrapper').addEventListener('click', function() {
                this.querySelector('.category-select').classList.toggle('open');
            })
            
            /* Iterating over all options and adding click function */
            for (const option of document.querySelectorAll(".category-option")) {
                option.addEventListener('click', function() {
                    if (!this.classList.contains('selected')) {
                        this.parentNode.querySelector('.category-option.selected').classList.remove('selected');
                        this.classList.add('selected');
                        this.closest('.category-select').querySelector('.category-select__trigger span').textContent = this.textContent;
                    }
                })
            }
            
            /* closing the dropdown list */
            window.addEventListener('click', function(e) {
                const select = document.querySelector('.category-select')
                if (!select.contains(e.target)) {
                    select.classList.remove('open');
                }
            });
        </script>

    </body>
</html>