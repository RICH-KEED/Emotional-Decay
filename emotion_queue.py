import heapq
from datetime import datetime
from typing import List, Tuple, Optional
from dataclasses import dataclass

@dataclass
class Emotion:
    name: str
    priority: float
    timestamp: datetime
    
    def __post_init__(self):
        # Store negative priority for max-heap behavior
        self._heap_priority = -self.priority

class EmotionPriorityQueue:
    def __init__(self, decay_rate: float = 0.1, threshold: float = 0.1):
        self.heap: List[Tuple[float, datetime, str]] = []
        self.decay_rate = decay_rate
        self.threshold = threshold
        self._counter = 0  # For stable sorting when priorities are equal
    
    def add_emotion(self, name: str, priority: float) -> None:
        """Add an emotion to the priority queue."""
        timestamp = datetime.now()
        # Use negative priority for max-heap, counter for stable sorting
        heapq.heappush(self.heap, (-priority, self._counter, timestamp, name))
        self._counter += 1
    
    def get_all_emotions(self) -> List[Emotion]:
        """Get all emotions sorted by priority (highest first)."""
        emotions = []
        for neg_priority, _, timestamp, name in self.heap:
            priority = -neg_priority
            emotions.append(Emotion(name, priority, timestamp))
        
        # Sort by priority (highest first)
        emotions.sort(key=lambda x: x.priority, reverse=True)
        return emotions
    
    def get_highest_priority_emotion(self) -> Optional[Emotion]:
        """Get the emotion with the highest priority."""
        if not self.heap:
            return None
        
        neg_priority, _, timestamp, name = self.heap[0]
        priority = -neg_priority
        return Emotion(name, priority, timestamp)
    
    def apply_decay(self) -> int:
        """Apply decay to all emotions and remove those below threshold."""
        if not self.heap:
            return 0
        
        # Extract all emotions, apply decay, and filter
        new_heap = []
        removed_count = 0
        
        while self.heap:
            neg_priority, counter, timestamp, name = heapq.heappop(self.heap)
            priority = -neg_priority
            
            # Apply decay
            new_priority = priority * (1 - self.decay_rate)
            
            # Only keep if above threshold
            if new_priority >= self.threshold:
                heapq.heappush(new_heap, (-new_priority, counter, timestamp, name))
            else:
                removed_count += 1
        
        self.heap = new_heap
        return removed_count
    
    def clear(self) -> None:
        """Clear all emotions from the queue."""
        self.heap.clear()
        self._counter = 0
    
    def is_empty(self) -> bool:
        """Check if the queue is empty."""
        return len(self.heap) == 0
    
    def size(self) -> int:
        """Get the number of emotions in the queue."""
        return len(self.heap) 