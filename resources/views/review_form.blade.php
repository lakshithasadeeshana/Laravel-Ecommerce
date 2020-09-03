 


        <!-- Button trigger modal -->

        @if(auth()->check())
         
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
   Add a Review
</button>
           @else
           <a class="btn btn-primary" href="{{ route('login') }}">Please Log In to The System to Add a Review</a>
           @endif




<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="font-family:'Courier New', Courier, monospace">Add a Review </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body" >
      <form method="post" action="{{ route('productsreview.store') }}" > 
               @csrf

            <div class="form-group" >    
              <label for="rating">Rating : </label>
              <select class="form-control" name="rating" >
             <option  value="1">*</option>
             <option value="2">**</option>
             <option value="3">***</option>
             <option value="4">****</option>
             <option value="5">*****</option>
              </select>
          </div>

          <div class="form-group">
              <label for="last_name">Topic :</label>
              <input type="text" class="form-control" name="headline"/>
          </div>
         
          <div class="form-group">
              <label for="city">Description:</label>
              <textarea id="description" row="5" class="form-control" name="description"></textarea>
          </div>
             
             <input type="hidden" name="product_id" value="{{$p->id}}" >
                    
             <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" >Submit</button>
      
      </div>
      </form>

            
      </div>
      
      
      
    </div>
  </div>
 



</div>




  <!----------<script type="text/javascript">
  $(document).ready(function(){
    $('#addform').on('submit',function(e){
      e.prevebtDefault();

      $.ajax({
        type:"POST",
        url:"/productsreview.store",
        data: $('#addform').serialize(),
        sucess: function(response){
          console.log(response)
          $('#exampleModalLabel').modal('hide')
          alert("Data Save");
        }
        error:function(error){
          console.log(error)
          alert("Data Not Saved");
        }
      });
    });
  });
  </script>---------------->