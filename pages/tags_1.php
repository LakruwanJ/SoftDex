<!DOCTYPE html>
<html>
<head>
  <title>Tag Form</title>
  <style>
    .tag-label {
      display: inline-block;
      background-color: #f0f0f0;
      padding: 5px;
      margin: 5px;
      border-radius: 5px;
    }
  </style>
  <script>
    // This JavaScript code will be used to process the input in the tags field
    document.addEventListener("DOMContentLoaded", function() {
      var tagsInput = document.getElementById("tagsInput");
      var tagsContainer = document.getElementById("tagsContainer");

function addTags() {
    var tagsArray = tagsInput.value;
        tagsContainer.innerHTML = "";
          tag = tag.trim();
          if (tag !== "") {
            var tagLabel = document.createElement("span");
            tagLabel.className = "tag-label";
            tagLabel.textContent = tag;

            // Add a delete button to remove the tag
            var deleteButton = document.createElement("button");
            deleteButton.textContent = "X";
            deleteButton.onclick = function() {
              tagsInput.value = tagsInput.value.replace(tag + ",", "").replace(tag, "").trim();
              updateTags();
            };
            tagLabel.appendChild(deleteButton);

            tagsContainer.appendChild(tagLabel);
            tagCount++;
          }
        };
}

      function updateTags() {
        var tagsArray = tagsInput.value.split(",");
        tagsContainer.innerHTML = "";
        var tagCount = 0;
        tagsArray.forEach(function(tag) {
          tag = tag.trim();
          if (tag !== "") {
            var tagLabel = document.createElement("span");
            tagLabel.className = "tag-label";
            tagLabel.textContent = tag;

            // Add a delete button to remove the tag
            var deleteButton = document.createElement("button");
            deleteButton.textContent = "X";
            deleteButton.onclick = function() {
              tagsInput.value = tagsInput.value.replace(tag + ",", "").replace(tag, "").trim();
              updateTags();
            };
            tagLabel.appendChild(deleteButton);

            tagsContainer.appendChild(tagLabel);
            tagCount++;
          }
        });
      }

      tagsInput.addEventListener("input", function(event) {
        if (event.data === ',') {
          tagsInput.value = tagsInput.value.replace(/,+/g, ",");
          tagsInput.value = tagsInput.value.replace(/, $/, ""); // Remove comma at the end if any
        }
        updateTags();
      });

      // Call the updateTags function initially to display tags on page load (if any)
      updateTags();
    });
  </script>
</head>
<body>
  <h2>Enter Tags (separated by commas)</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
    <input type="text" name="tags" id="tagsInput" required>
    <input type="submit" value="Submit">
  </form>

  <div id="tagsContainer"></div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['tags'])) {
        // Get the input from the form
        $tagsInput = $_POST['tags'];

        // Split the input value into an array of tags separated by commas
        $tagsArray = explode(",", $tagsInput);

        // Remove any leading/trailing spaces from each tag
        $tagsArray = array_map('trim', $tagsArray);

        // Remove empty tags
        $tagsArray = array_filter($tagsArray, function($tag) {
          return $tag !== "";
        });

        // Limit the number of tags to 7
        if (count($tagsArray) > 7) {
            $tagsArray = array_slice($tagsArray, 0, 7);
        }

        // Combine tags into a single string separated by |
        $tagsString = implode("|", $tagsArray);

        // Display the tags
        echo "<h2>Tags:</h2>";
        echo "<div id='tagsContainer'>";
        foreach ($tagsArray as $tag) {
            echo "<span class='tag-label'>" . htmlspecialchars($tag) . "</span>";
        }
        echo "</div>";

        // Now you can use $tagsString for further processing or storage
        // For example, you can echo it here:
        echo "<p>Tags String: " . htmlspecialchars($tagsString) . "</p>";
    }
}
?>

</body>
</html>
