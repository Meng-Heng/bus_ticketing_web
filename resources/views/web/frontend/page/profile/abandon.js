{/* <script type="text/javascript">
  $(document).on('click', '#openProfile', function(e) {
      var userId = $(this).data('id'); // Get the user ID from the clicked button
  
      // Use Axios/jQuery AJAX to fetch the current data from the server
      axios.get('/profile/' + userId + '/edit')
          .then(function (response) {
              // Fill the modal fields with the user data
              $('#usernameId').val(response.username);
              // Add more fields as needed
              $('#profileInfo').modal('show'); // Show the modal
          })
          .catch(function (error) {
              console.log(error);
          });
      });
  
      // Handle form submission
      $('#userEditForm').submit(function(e) {
          e.preventDefault();
  
          // Gather the form data
          var formData = $(this).serialize();
  
          axios.post('/profile/update', formData)
              .then(function(response) {
                  alert('User updated successfully');
                  $('#profileInfo').modal('hide'); // Hide the modal
                  // Optionally, update the view with the new data without refreshing
              })
              .catch(function(error) {
                  console.log(error);
              });
      });
  </script> */}