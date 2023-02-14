<!--<footer class="footer" style="margin-top:10px;">
    <img src="{{asset('images/pitb-logo.png')}}" alt="PITB Logo" />
    Powered By Punjab Information Technology Board
</footer>-->




  
<script type="text/javascript">
    
    const searchBtn = document.querySelector(".search-btn");
    const cancelBtn = document.querySelector(".cancel-btn");
    const searchBox = document.querySelector(".search-box");

//    searchBtn.onclick = () => {
//      searchBox.classList.add("active");
//    }

//    cancelBtn.onclick = () => {
//      searchBox.classList.remove("active");
//    }
</script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        //$(".datepicker").datepicker();
    })
</script>