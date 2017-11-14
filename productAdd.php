<!DOCTYPE html>
<html>
    <head>
        <title><?php echo (!isset($_GET["id"]) ? "Add My Product" : "Edit My Product") ?></title>

        <?php
            include_once "./tag/header.php";
        ?>
		
		<!-- Form validation Javascript -->
   	 	<script src="assets/js/form_validation.js"></script>
    </head>
    <body>
        <?php
            include_once "./tag/Nbar.php";
            require "process/db_link.php";
        ?>
        
        <div class="content">
            <div class="container">
				<h1 class="page-header" style='margin-bottom:0px;'>
                    <?php echo (!isset($_GET["id"]) ? "Add My Product" : "Edit My Product") ?>                   
                </h1>
				<div id="productRegisterForm"></div>
            </div>
        </div>		
		
		<script type="text/javascript" charset="utf-8">	
					var productRegisterForm = [
				{					
					id:"formContent",
					rows:[
                        { view:"label", id:"invMsg", css:"invalidMsg", label:"* Some field(s) did not input properly, please fix the mistake by following the instruction message to those input field(s)", hidden:true },
						{ template:"Product Images", type:"section" },
						{ 
							cols:[
								{
									view: "uploader",
									width:140,
									value: 'Upload Image(s)', 
									autosend: false,
									id:"product_images",
									name:"product_images",
									inputName:"product_images",
									accept:"image/png, image/jpeg, image/jpg",
									link:"uploadTemplate", 
									upload:"process/upload_images.php",
									on:{								
										"onBeforeFileAdd":function(item){
											var type = item.type.toLowerCase();
											var itemsizeMB = item.size/1024;
											
											}
											
											if (itemsizeMB >= 3072){
												alert(item.name + " file size exceeded maximum 3MB limit");
												return false;
											}
											
											var data = this.files.data.pull;
											var countData = this.files.data.order;
											if(countData.length > 0)
												for(var i=0; i<countData.length; i++)
													if(item.name === data[countData[i]].name)
														return false;
											
											if(this.files.data.order.length >= 5)
												return false;
										}
									}
								},
								{ width:10 },
								{ 
									view:"label", label:"* Minimum 1 image, maximum 5 images (JPG/JPEG/PNG) to be uploaded" 
								}
							]
							
						},
						{ view:"label", id:"noImgInvalidMsg", label:"<span style='color:red'>* No image chosen</span>", hidden:true },
						{
						 	view:"template", 							
							width:150,
							autoheight:true,
							id:"uploadTemplate",
							borderless:true,
							template:uploadTemp
						},
						{ template:"Product Details", type:"section" },
						{
							view:"combo",
							id:"categorySelect",
							width:400,
							label:"Category",
							name:"product_category",							
							required: true,
							invalidMessage:"* Required",
							suggest:{
								body:{
									data:[
										{ id:1, value:"Accessories & Clothing" },
										{ id:2, value:"Bedding/Room Décor" },
										{ id:3, value:"Craft Supplies" },
										{ id:4, value:"Jewelry" },
										{ id:5, value:"Soft Toys" },
										{ id:6, value:"Vintage Arts" },
										{ id:7, value:"Wedding Accessories" },
									],
									yCount:10
								}
							}
						},
						{ view:"text", width:600, label:"Name", name:"product_name", required:true, invalidMessage:"* Required" },
						{ view:"textarea", width:700, label:"Description", name:"product_desc", required:true, height:120, invalidMessage:"* Required" },
						{ view:"text", label:"Stock Quantity", id:"stockQuantity", name:"product_stockQty", width:280,invalidMessage:"* Invalid input", required:true, attributes:{ type:"number", min:"0" } },
						{ 
							cols:[
								{ view: "text", label:"Weight", name:"product_weight", width:280, placeholder:"0.00", required:true, invalidMessage:"* Invalid input", },
								{ view: "label", label:"kg" }
							]							
						},		
						{ view:"text", label:"Price", name:"product_price", width:280, placeholder:"0.00", required:true },
						{ view:"text", width:700, label:"Tag(s)", name:"product_tags", placeholder:"Separate by single whitespace (e.g. Cloth, food and etc)" },
						{ view:"textarea", width:700, label:"Product Policy", name:"product_policy", height:100, placeholder:"Remarks for Warranty/Refund Issue/Any Clarifications", required:true, invalidMessage:"* Required" },
					]
				},
				{
					cols:[
						{ width:140 },
						{ view:"button", template:"<a class='btn btn-success' id='submitBtn' onClick='submit()' style='width:70px'><?php echo (!isset($_GET["id"]) ? "Add" : "Update") ?></a> <a class='btn btn-danger' style='width:70px' href='productManage.php'>Cancel</a>", width:300 }
					]
				}
			];
			
			webix.ui({
				container:"productRegisterForm",
				rows:[
					{
						view:"form",
						id:"productRegisterForm",
						borderless:true,
						elements:productRegisterForm,
						elementsConfig:{
							labelAlign:"right",
							labelWidth: 140,
							width:1100
						},
						rules:{
							"product_category"  : webix.rules.isNotEmpty,
							"product_name"      : webix.rules.isNotEmpty,
							"product_desc"      : webix.rules.isNotEmpty,
							"product_stockQty"  : function(value,data,name){ return validateStockQty(value,data,name,this) },
							"product_weight"    : function(value,data,name){ return validateWeightPrice(value,data,name,this) },
							"product_price"     : function(value,data,name){ return validateWeightPrice(value,data,name,this) },
							"product_tags"      : function(value,data,name){ return validateTags(value,data,name,this) },
							"product_policy"    : webix.rules.isNotEmpty
						}
					}
				]
			});
			
		        var uploadTemp = function(data){
                var preview = "";

                if(!data.order || data.order.length === 0)
                {
                    preview = "<img src='"+"assets/images/uploadsample.png' height=200 width=200/>";
                    preview += "<br/>";
                    preview += "<span style='display:inline-block; width:200px; text-align:center'>No image selected</span> ";
                }

                var suffix = ["","a","b","c","d","e"];
                var removeLink = "";
                if (data.each)
                {
                    data.each(function(obj){
                        preview += "<img id='" + obj.id + "' ";
                      
                        if(obj.status == 'client')
                        {
                            var image = document.getElementById(obj.id);
                            var reader  = new FileReader();

                            reader.onloadend = function (e) {
                                $("#"+obj.id).attr('src',e.target.result);
                            }

                            reader.readAsDataURL(obj.file);
                        }
                        else
                        {
                            var filetype = "." + obj.name.split(".")[1];
                            preview += "src='assets/images/products/"+<?php echo (isset($_GET["id"]) ? $_GET["id"] : "1") ?> +"/"+suffix[obj.id]+filetype+"' ";
                        }
                        preview     += "height=200 width=200/> ";
                        removeLink  += "<a href='javasript:;' onClick='removeImage("+ obj.id +","+ '"' +obj.name + '"' +")' style='display:inline-block; width:200px; text-align:center'>[ - Remove ]</a> ";
                    });
                    preview += "<br/>" + removeLink;
                }
                return preview;
            }
                       
            var removedImage = [];
			function removeImage(imageID, imageName)
			{
                if(imageID <= 5)
                    removedImage.push(imageName);
				$$("product_images").files.data.remove(imageID);
			}			
            
            function uploadImages(action,countImgUpload,productID,countToUpload,serverData){                
				var imgUploader = $$("product_images");
                if(action === "add")
                {

                    imgUploader.define('formData',{ action: "add", countUpload:countImgUpload });
                    $$("product_images").send(function(response){
                        if(response.status == "server")
                            window.location = "productManage.php";                        
                    });
                }
                else if(action === "modify")
                {
             
                    imgUploader.define('formData',{ id:productID, countUpload:countToUpload, serverData:serverData, action:"modify" });
                    $$("product_images").send(function(response){
                        console.log(response)
                        if(response.status == "server")
                            window.location = "productManage.php";
                    });
                }
                else if(action === "delete")
                {
                    webix.ajax().post("process/upload_images.php", { id:productID, serverData:serverData, action:"delete" }, 
                        function(text, data){   
                            if(text === "success")
                                window.location = "productManage.php";
                        })
                }
            }
                        
			function submit(){				
                $$("invMsg").hide();
                var productForm = $$("productRegisterForm");
				var imgUploader = $$("product_images");
                var imgFiles = imgUploader.files.data;
                var countImgUpload = imgFiles.order.length;
				var isFormValid = productForm.validate();
                
				if( countImgUpload > 0 && isFormValid )
				{   
                    <?php 
                        if(isset($_GET["id"])) { 
                            echo "var productID = ".$_GET['id'];
                    ?>									
                            var data = imgFiles.pull;
                            var serverData = [];    
                            var countToUpload = 0;
                            for(var key in data)
                            {  
                                var filename = data[key].name;
   
                                if(key <= 5)
                                    serverData.push(filename);
                                else
                                    countToUpload++;
                            }
                   
                            if(countToUpload === 0 && removedImage.length > 0)
                                uploadImages("delete",0,productID,countToUpload,serverData);
							else if(countToUpload > 0)uploadImages("modify",0,productID,countToUpload,serverData);
                    <?php
                            echo "imgUploader.define('formData',{ id:productID, countUpload:countToUpload, serverData:serverData });";
                            echo "productForm.setValues({id:".$_GET["id"]."},true)";
                        };
                    ?>
                    
					
					webix.ajax().post("process/productEdit_process.php", productForm.getValues(),
						function(text, data){
							if(text == "success")
                                <?php echo (!isset($_GET["id"]) ? "uploadImages('add',countImgUpload,0,0,'');" : "uploadImages('modify',0,productID,countToUpload,serverData);") ?>  
						});                   
				}
				else {
					if(countImgUpload === 0)
                        $$("noImgInvalidMsg").show();
					else
						$$("noImgInvalidMsg").hide();
                    
                    $$("invMsg").show();
                    window.location = "#";  
				}
			}
            
            <?php require "process/productEdit_getDetails.php"; ?>
		</script>
        <?php
            include_once "./tag/footer.php";
        ?>
    </body>
</html>