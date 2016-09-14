	<footer class="footer">			
        <p class="no-margin">
            &copy; 2015 <strong></strong>. ALL Rights Reserved. 
        </p>	
    </footer>
</div>
<a href="#" class="scroll-to-top hidden-print"><i class="fa fa-chevron-up fa-lg"></i></a>
<!-- Jquery -->




<script type="text/javascript">
$(function()	{
	//Delete Widget Confirmation
	$('#deleteWidgetConfirm').popup({
		vertical: 'top',
		pagecontainer: '.container',
		transition: 'all 0.3s'
	});

	//Form Validation
	$('#basic-constraint').parsley( { listeners: {
		onFormSubmit: function ( isFormValid, event ) {
			if(isFormValid)	{
				return false;
			}
		}
	}}); 
	
	$('#type-constraint').parsley( { listeners: {
		onFormSubmit: function ( isFormValid, event ) {
			if(isFormValid)	{
				return false;
			}
		}
	}}); 
	 
	$('#formValidate1').parsley( { listeners: {
		onFormSubmit: function ( isFormValid, event ) {
			if(isFormValid)	{
				alert('Registration Complete');
				return false;
			}
		}
	}}); 
	
	$('#formValidate2').parsley( { listeners: {
		onFieldValidate: function ( elem ) {
			// if field is not visible, do not apply Parsley validation!
			if ( !$( elem ).is( ':visible' ) ) {
				return true;
			}

			return false;
		},
		onFormSubmit: function ( isFormValid, event ) {
			if(isFormValid)	{
				alert('Your message has been sent');
				return false;
			}
		}
	}}); 
}); 


function deleteRowSec(row){    	 
//	 var tbl=document.getElementById('POITableSec');
//	 var tblLgt = tbl.rows.length;
//	 if (tblLgt == 2) {		
//			return;
//		}
            var i=row.parentNode.parentNode.rowIndex;
            document.getElementById('POITableSec').deleteRow(i);
	}
  /*      
  function insRowSec()
	{
	 var max_fields = 11;
	 var tbl=document.getElementById('POITableSec');
	 var tblLgt = tbl.rows.length;
	 if (tblLgt >= max_fields) {
                alert(" Maximum 10 Urls are allowed ! ");
		return;
	}
        var x=document.getElementById('POITableSec');
        var new_row = x.rows[1].cloneNode(true);
        var len = x.rows.length;      
        x.appendChild( new_row );
}
*/
</script>


</body>
</html>
