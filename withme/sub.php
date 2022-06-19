   <!-- 광고 및 최근 검색 -->
   <div class="sub">
   <div class="container-fluid">
        <div class="form-inline">
            <button type="submit" id="submit" class="btn btn-secondary">검색</button>
            <input type="text" class="form-control" id="keyword" placeholder="검색어를 입력" name="keyword">
        </div>
        <br>
        <div id="searchlist">
            <h4>최근 최다 검색어</h4>

        </div>
    <script>	 
	$(document).ready(function(){  
		$("#submit").click(function(){ 
				if($("#keyword").val().length == 0) { 
            alert("검색어를 입력하세요."); 
            $("#keyword").focus(); 
            return false; 
            } 
            $.post("action_page.php",
            {
            keyword: $("#keyword").val()
            },
            function(data,status){
            var html = "";
            $.each(data, function(i, field){
                html += "<tr><td>" + field["keyword"] + "</td><td>" + field["cnt"] + "</td></tr>";
            });
            $("tbody").html(html);
            });
        });		 
	}); 
	</script> 
    </div>