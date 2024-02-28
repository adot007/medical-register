<!--<form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->
<!-- Search Patient Form -->
            <!-- class="mb-6"-->
<form method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
    <div class="input-group">
        <input type="text" id="search" name="search" class="form-control bg-light border-0 small px-3 py-2 rounded-md"
            placeholder="Search Patient by Name or Roll Number..." aria-label="Search" aria-describedby="basic-addon2">

        <div class="input-group-append">
            <button type="submit" class="btn bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600">
                Search
            </button>
        </div>
    </div>
</form>
           
        <?php

    
include('../includes/db_conn.inc.php');
        
    
        // Process search
        if(isset($_GET['search']) && $_GET['search'] != "") {
            $search = $_GET['search'];            
    
            // Query to search patient by name or roll number
            $sql = "SELECT * FROM patient_data WHERE first_name LIKE '%$search%' OR surname LIKE '%$search%' OR roll_num LIKE '%$search%'";
            $result = $conn->query($sql);
        }
    ?>
        

         
