<?php
    include('./partials/navbar.php');
    include('./partials/check-login.php');
?>
<style>
    .hidden{
        display:none;
    }
</style>
 <script type="text/javascript">
    function handleSelection(choice) {
        document.getElementById('selectRepetition').disabled=true;
        document.getElementById(choice).style.display="block";
    }
 </script>
<div class="container-fluid">
<div class="main-content my-3">
    <h1>Add Event</h1>
    <div class="row">
        <div class="col-10">
            <form action="validate-new-event.php" method="POST">
                <p>Title</p> 
                <div class="input-group mb-3">
                    <input type="text" name="title" placeholder="Event Title" style="width:100%;">
                </div>
                <p>Description</p> 
                <div class="input-group mb-3">
                    <textarea name="description" placeholder="Event Description" rows="5" style="width:100%;"></textarea>
                </div>
                <div class="row">
                    <div class="col-3">
                        <p>Date</p> 
                        <div class="input-group mb-3">
                            <input type="date" name="date">
                        </div>
                    </div>
                    <div class="col-3">
                        <p>Time</p> 
                        <div class="input-group mb-3">
                            <input type="time" name="time">
                        </div>
                    </div>
                    <div class="col-3">
                        <p>Location</p> 
                        <div class="input-group mb-3">
                            <input type="text" name="location">
                        </div>
                    </div>       
                    <div class="col-3">   
                        <p>Active</p> 
                        <div class="input-group mb-3">
                            <ul style="list-style-type: none;">
                            <li><input type="radio" name="active" value="Yes"> Yes</li>
                            <li><input type="radio" name="active" value="No"> No</li>
                            </ul>
                        </div>
                    </div>         
                </div>
                <p>Repeat</p> 
                <div class="input-group mb-3">
                    <select name="select" id="selectRepetition" onChange="handleSelection(value)" class="form-select">
                        <option selected value="no">No </option>
                        <option value="weekly">Repeat by day of the week</option>
                        <option value="monthly">Repeat by day of the month </option>
                    </select>
                    <div class="hidden input-group" id="weekly">
                        </br>
                        <p>How Many Times:</p> 
                        <input type="number" id="weeklyRepetition" name="weeklyRepetition" />
                        <p>How Frequently - where 1 means weekly, 2 means every two weeks, 52 means yearly, etc:</p> 
                        <input type="number" id="weeklyRepetitionFrequency" name="weeklyRepetitionFrequency" max="52" />
                    </div>
                    <div class="hidden input-group" id="monthly">
                        </br>
                        <p>How Many Times:</p> 
                        <input type="number" id="monthlyRepetition" name="monthlyRepetition" />
                    </div>
                </div>
                <div class="input-group justify-content-center mb-3">
                    <button type="submit" name="submit" value="Add Item" class="btn btn-light my-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php include("partials/footer.php"); ?>