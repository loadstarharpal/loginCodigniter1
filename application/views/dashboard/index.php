<div class="main-container">
        <div class="padding-md">
            <h3 class="header-text m-bottom-md" style="margin-left:24px;">Meals</h3>
            <div class="row user-profile-wrapper">               
                <div class="col-md-12">
		    <div class="clearfix margin_10"></div>
					
               		<fieldset class="fieldset2 col-lg-12">
                         
                         <form method="post" action=""class="form-horizontal no-margin"  enctype="multipart/form-data" id="basic-constraint" data-validate="parsley" novalidate>
                               <div class="col-lg-12 col-md-12 col-sm-12"> 			
                                <table class="table table-striped table-bordered bootstrap-datatable datatable responsive" id="mainTable">
                                <thead>
                                <tr style="background-color: #edeef1;">
                                    
                                     <th>Meal Name</th>
                                     <th>Vendor Name</th>
                                      <th>Image</th>
                                    <th>Price</th>
                                     <th>Active/Inactive</th>
                                    <th align="center" style="width:12%;"><div style="text-align:center;"></div></th>
                                   
                                </tr>
                                </thead>
                                 <tbody id="POITableSec">
                                  
		                                               <tr>
                                   
                                    <td> 
                                        <div style="margin-top:4px;"><input type='text' id="search_data" required="" value="" name="name" class="form-control input-lg" style="width:100%;" placeholder="name"/></div>
                                   </td>
                                    <td> 
                                        <div style="margin-top:4px;"><select  required="" name="vendor_id" class="form-control input-lg" >
                                        <option value="" selected >Select Vendor</option>
                                        <?php foreach ($vendors as $vendor){
											?>
											<option value="<?php echo$vendor['id'];?>"><?php echo$vendor['name'];?></option>
											<?php
											}?>
                                        </select></div>
                                    </td>
                                    <td> 
                                        <div style="margin-top:4px;"><input type='file' id="" value=""  required=""name="image_path" class="form-control input-lg" style="width:100%;"/></div>
                                    </td>
                                    <td> 
                                       <div style="margin-top:4px;"><input type='text' id="" value=""  required="" name="price" class="form-control input-lg" style="width:100%;" placeholder="price"/></div>
                                    </td>
 <td> 
                                       <div style="margin-top:4px;"><select  required="" name="status" class="form-control input-lg" >
										   <option value=''>None</option>
										   <option value='active'>Active</option>
										   <option value='inactive'>Inactive</option>
										   </select>
										   </div>
                                    </td>
                                    <td align="center" class="center"><input type="submit" name="submit" value="Submit"class="btn btn-info"  ></td>
                                  
                                  </tr>
                                  
                                  
                                                                 
                   </form>                 
                                       
                                </tbody>
                                
                                <div class="clearfix margin_10"></div>

							<div class="col-lg-12 col-md-12 col-sm-12"> 			
                                <table id="mainTable" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                <thead>
                                <tr style="background-color: #edeef1;">
                                    <th>Meal Id</th>
                                    <th class="center">Meal Name</th>
                                    <th class="center">Price</th>
                                    <th class="center">Vendor Name</th>
                                    <th style="width:12%;" align="center"><div style="text-align:center;">Edit</div></th>
                                    <th style="width:12%;" align="center"><div style="text-align:center;">Delete</div></th>
                                </tr>
                                </thead>
                                <tbody>    
                                <?php
        foreach($records as $row):
    ?>
    <tr>
		                        	<td><div style="margin-top:4px;"><?=$row['id']?></div></td>
		                        	<td><div style="margin-top:4px;"><?=$row['name']?></div></td>
		                        	<td><div style="margin-top:4px;"><?=$row['price']?></div></td>
		                        	<td><div style="margin-top:4px;"><?=$row['vendor_name']?></div></td>
                                    
                                    <td align="center"><input type="button"  id="editTable" name="editTable" value="Edit" class="btn btn-info" /></td>
                                    <td align="center">
										<div type="button" class="btn btn-info" onClick="">
                        					<i class="fa fa-times-circle" style="font-size:18px;"></i>
										</div>
									</td> 
                                </tr>	
    <?php
        endforeach;
    ?>
               					
                				</tbody>				
								</table>
							</div>
                                
                          				
                                </table>
                            </div>
            </div>
	
    </fieldset>
 </div>
</div>
</div>
</div>




