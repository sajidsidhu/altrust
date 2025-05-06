@extends('dashboard.dashboard')
@section('content')
<div class="container mt-5">
   <div class="filter mb-4" style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
      <div class="d-flex align-items-center gap-2">
         <h4 class="mb-0" style="color: var(--primary-blue);">📢 Timeline Logs</h4>
         <span class="badge rounded-pill" style="background: var(--light-gray); color: var(--text);">
         {{ $logs->count() }} Events
         </span>
      </div>
      <div class="d-flex align-items-center gap-2">
         <label style="margin-bottom: 0; color: var(--primary-blue);">From:</label>
         <input type="datetime-local" id="fromFilter" class="form-control" 
            style="font-family: 'Century Gothic', sans-serif; width: auto; border-color: var(--primary-blue);">
      </div>
      <div class="d-flex align-items-center gap-2">
         <label style="margin-bottom: 0; color: var(--primary-blue);">To:</label>
         <input type="datetime-local" id="toFilter" class="form-control" 
            style="font-family: 'Century Gothic', sans-serif; width: auto; border-color: var(--primary-blue);">
      </div>
      <button id="clearFilters" class="back-btn" 
         style="padding: 12px 25px; background: var(--primary-blue); color: var(--white); border: none; border-radius: 4px; cursor: pointer; transition: background 0.3s ease, transform 0.2s ease;">
      Clear
      </button>
   </div>
   @if($logs->isEmpty())
   <div class="message" style="background: var(--white); border-left: 4px solid var(--primary-blue); color: var(--text);">
      <i class="bi bi-info-circle me-2" style="color: var(--primary-blue);"></i>
      <span>No notifications found</span>
   </div>
   @else
   <div style="background: var(--white); padding: 20px; border-radius: 8px;">
      <div class="timeline">
         @foreach($logs->reverse() as $notification) <!-- Reversed the collection -->
         @php
         $createdAt = \Carbon\Carbon::parse($notification->created_at);
         $isNew = $createdAt->diffInHours(now()) < 24;
         @endphp
         <div class="timeline-item mb-4" 
            data-datetime="{{ $createdAt->format('Y-m-d\TH:i') }}">
            <div class="timeline-dot" 
               style="background: {{ $isNew ? 'var(--primary-dark)' : 'var(--primary-blue)' }};"></div>
            <div class="timeline-content" style="color: var(--text);">
               <div class="d-flex justify-content-between align-items-center">
                  <div class="flex-grow-1">
                     <div style="font-size: 1em; color: var(--text);">
                        {{ $notification->text }}
                     </div>
                     <div class="d-flex align-items-center small" style="color: #555;">
                        <i class="bi bi-calendar me-1" style="color: var(--primary-blue);"></i>
                        {{ $createdAt->format('d M Y') }}
                        <span class="mx-2">•</span>
                        <i class="bi bi-clock me-1" style="color: var(--primary-blue);"></i>
                        {{ $createdAt->format('h:i A') }}
                     </div>
                  </div>
                  @if($isNew)
                  <span class="badge rounded-pill ms-2" 
                     style="background: var(--primary-blue); color: var(--white);">
                  New
                  </span>
                  @endif
               </div>
            </div>
         </div>
         @endforeach
      </div>
   </div>
   @endif
</div>
<style>
   .timeline {
   position: relative;
   padding-left: 2rem;
   }
   .timeline-item {
   position: relative;
   transition: opacity 0.3s ease;
   }
   .timeline-dot {
   width: 14px;
   height: 14px;
   border-radius: 50%;
   position: absolute;
   left: -2rem;
   top: 8px;
   z-index: 1;
   border: 3px solid var(--white);
   box-shadow: 0 2px 4px rgba(0,0,0,0.1);
   }
   .timeline::before {
   content: '';
   position: absolute;
   left: 6px;
   top: 0;
   bottom: 0;
   width: 2px;
   background: var(--primary-blue);
   opacity: 0.2;
   }
   .timeline-content {
   padding: 10px 15px;
   border-bottom: 1px solid var(--light-gray);
   transition: background 0.3s ease;
   }
   .timeline-content:hover {
   background: var(--hover);
   }
   .timeline-item:last-child .timeline-content {
   border-bottom: none;
   }
   .back-btn:hover {
   background: var(--primary-dark);
   transform: translateY(-2px);
   }
</style>
<script>
   document.addEventListener('DOMContentLoaded', function() {
       const fromFilter = document.getElementById('fromFilter');
       const toFilter = document.getElementById('toFilter');
       const clearBtn = document.getElementById('clearFilters');
       const timelineItems = document.querySelectorAll('.timeline-item');
   
       function filterTimeline() {
           const fromDate = fromFilter.value ? new Date(fromFilter.value) : null;
           const toDate = toFilter.value ? new Date(toFilter.value) : null;
   
           timelineItems.forEach(item => {
               const itemDateTime = new Date(item.getAttribute('data-datetime'));
               
               let show = true;
   
               if (fromDate && itemDateTime < fromDate) show = false;
               if (toDate && itemDateTime > toDate) show = false;
   
               item.style.display = show ? 'block' : 'none';
           });
       }
   
       fromFilter.addEventListener('change', filterTimeline);
       toFilter.addEventListener('change', filterTimeline);
       
       clearBtn.addEventListener('click', function() {
           fromFilter.value = '';
           toFilter.value = '';
           timelineItems.forEach(item => item.style.display = 'block');
       });
   });
</script>
@endsection