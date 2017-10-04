<?php 
namespace MicrosoftAzure\Storage\Samples;
require_once "vendor/autoload.php";

use MicrosoftAzure\Storage\Common\ServicesBuilder;

$connectionString = 'BlobEndpoint=https://hfchewbaccastor.blob.core.usgovcloudapi.net/;DefaultEndpointsProtocol=https;AccountName=hfchewbaccastor;AccountKey=0N1QI4pOfpedFTpgI7W+YwAm+V9NyFA+89J8JXjXeYfaXQRtCQrVz0fyOueJYf6ZyoqFUGKC7hsQuxB/UcgX7A==;';
//EndpointSuffix=core.usgovcloudapi.net';
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);
//$blobClient = ServicesBuilder::getInstance()->createBlobService($connectionString);


//if they DID upload a file...
if($_FILES['photo']['name'])
{
    echo "file is here";

// Create blob REST proxy.
$blobRestProxy = ServicesBuilder::getInstance()->createBlobService($connectionString);

$content = fopen($_FILES['photo']['tmp_name'], "r");
$blob_name = "test";

try    {
    //Upload blob
    $blobRestProxy->createBlockBlob("images", $blob_name, $content);
}
catch(ServiceException $e){
    // Handle exception based on error codes and messages.
    // Error codes and messages are here:
    // http://msdn.microsoft.com/library/azure/dd179439.aspx
    $code = $e->getCode();
    $error_message = $e->getMessage();
    echo $code.": ".$error_message."<br />";
}

}
?><!--img src="https://hfchewbaccastor.blob.core.usgovcloudapi.net/images/test"/-->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script language="javascript">
     function processImage() {
        // **********************************************
        // *** Update or verify the following values. ***
        // **********************************************

        // Replace the subscriptionKey string value with your valid subscription key.
        var subscriptionKey = "24e45a93b5c6428089dfaa0f3c71e6c8";

        // Replace or verify the region.
        //
        // You must use the same region in your REST API call as you used to obtain your subscription keys.
        // For example, if you obtained your subscription keys from the westus region, replace
        // "westcentralus" in the URI below with "westus".
        //
        // NOTE: Free trial subscription keys are generated in the westcentralus region, so if you are using
        // a free trial subscription key, you should not need to change this region.
        var uriBase = "https://virginia.api.cognitive.microsoft.us/vision/v1.0/analyze";

        // Request parameters.
        var params = {
            "visualFeatures": "Description",
            "details": "",
            "language": "en",
        };

        // Display the image.
        var sourceImageUrl = document.getElementById("inputImage").value;
        document.querySelector("#sourceImage").src = sourceImageUrl;

        // Perform the REST API call.
        $.ajax({
            url: uriBase + "?" + $.param(params),

            // Request headers.
            beforeSend: function(xhrObj){
                xhrObj.setRequestHeader("Content-Type","application/json");
                xhrObj.setRequestHeader("Ocp-Apim-Subscription-Key", subscriptionKey);
            },

            type: "POST",

            // Request body.
            data: '{"url": ' + '"' + sourceImageUrl + '"}',
        })

        .done(function(data) {
            $("#description").val(data.description.captions.text);
            $("#confidence").val(data.description.captions.confidence);
            // Show formatted JSON on webpage.
            $("#responseTextArea").val(JSON.stringify(data, null, 2));
        })

        .fail(function(jqXHR, textStatus, errorThrown) {
            // Display error message.
            var errorString = (errorThrown === "") ? "Error. " : errorThrown + " (" + jqXHR.status + "): ";
            errorString += (jqXHR.responseText === "") ? "" : jQuery.parseJSON(jqXHR.responseText).message;
            alert(errorString);
        });
    };
</script>

<h1>Analyze image:</h1>
Enter the URL to an image of a natural or artificial landmark, then click the <strong>Analyze image</strong> button.
<br><br>
Image to analyze: <input style="visibility:hidden;" type="text" name="inputImage" id="inputImage" value="https://hfchewbaccastor.blob.core.usgovcloudapi.net/images/test" />
<button  style="visibility:hidden;" onclick="processImage()">Analyze image</button>
<br><br>
<h1>I am <span id="confidence"></span>% confident that this is a <span id="description"></span></h1>

<div id="wrapper" style="width:1020px; display:table;visibility:hidden;">
    <div id="jsonOutput" style="width:600px; display:table-cell;">
        Response:
        <br><br>
        <textarea id="responseTextArea" class="UIInput" style="width:580px; height:400px;"></textarea>
    </div>
    <div id="imageDiv" style="width:420px; display:table-cell;">
        Source image:
        <br><br>
        <img id="sourceImage" width="400" />
    </div>
</div>
</body>
<script language="javascript">$.ready(processImage());</script>
</html>