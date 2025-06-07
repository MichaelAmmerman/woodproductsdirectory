<!DOCTYPE html>

<html>
<header>
    <style>
    .container {
        display: grid;
        grid-template-areas:
            "search box output";
        grid-template-columns: .5fr.5fr 3fr;
        gap: 5px;
        background-color: #2196F3;
        padding: 5px;
    }

    .container>div {
        background-color: rgba(255, 255, 255, 0.8);
        padding: 5px;
    }

    .container>div.search {
        grid-area: search;
    }

    .container>div.output {
        grid-area: output;
    }

    .container>div.box {
        grid-area: box;
        background-color: #f1f1f1;
        padding: 5px;
    }
    h3 {
        font-family: Calibri;
        font-size: 16pt;
        padding: 0px;
        font-weight: bold;
        margin-bottom: 2px;
        margin-top: 3px
    }

    #search{
        font-family: Calibri;
        font-size: 24pt;
        padding: 0px;
        font-weight: bold;
        margin-bottom: 2px;
        margin-top: 3px;
    }
    label {
        font-family: Calibri;
        font-size: 16pt;
        padding: 0px;
        font-weight: normal;
        margin-bottom: 2px;
        margin-top: 3px;
    }
    input[type="radio"] {
        accent-color: #0033a0
    }
    </style>


</header>

<body>
    <form>
        <label for="search" id="search">Search:</label>
        <input type="text" style="width:94.1%" style="height:10000000px"> <br>
        <div class="container">
            <div class="search">
                <h3>Search By</h3>
                <div>
                    <input type="radio" id="searchCounty" name="search" value="County" checked="Checked">
                    <label for="searchCounty">County</label><br>
                </div>
                <div>
                    <input type="radio" id="searchCompany" name="search" value="Company">
                    <label for="searchCompany">Company</label><br>
                </div>
                <div>
                <input type="radio" id="searchCity" name="search" value="searchCity">
                <label for="searchCity">City</label><br>
                </div>
                <div>
                <input type="radio" id="searchProducts" name="search" value="Products_Produced">
                <label for="searchProducts">Products Produced</label><br>
                </div>
                <h3 style="margin-top: 10px">FILTER BY</h3>
                <input type="radio" id="filterCounty" name="filterCounty" value="County">
                <label for="County2">County</label><br>
            </div>
        </div>
    </form>
    <?php



    ?>

</body>

</html>