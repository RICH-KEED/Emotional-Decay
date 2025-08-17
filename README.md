# 🎭 Emotion Priority Queue Visualizer

A simple Python application that visualizes an emotion priority queue with decay functionality. Built with Streamlit for an interactive web interface.

## Features

- **Add Emotions**: Input emotion names with custom priorities
- **Priority Queue Visualization**: View all emotions sorted by priority with timestamps
- **Decay Mechanism**: Apply decay to reduce all priorities and remove emotions below threshold
- **Visual Highlighting**: Highest priority emotion is prominently displayed
- **Configurable Settings**: Adjust decay rate and removal threshold
- **Real-time Updates**: Interactive interface with immediate visual feedback

## Installation

1. Clone or download this repository
2. Install the required dependencies:

```bash
pip install -r requirements.txt
```

## Usage

### Running the Application

Start the Streamlit application:

```bash
streamlit run app.py
```

The application will open in your web browser at `http://localhost:8501`

### How to Use

1. **Adding Emotions**:
   - Enter an emotion name (e.g., "Happiness", "Anxiety", "Excitement")
   - Set its priority value (higher numbers = higher priority)
   - Click "Add Emotion"

2. **Viewing the Queue**:
   - All emotions are displayed in a table sorted by priority
   - The highest priority emotion is highlighted with 🔥
   - Timestamps show when each emotion was added
   - Statistics show total count, highest priority, and average priority

3. **Applying Decay**:
   - Click "Apply Decay" to reduce all emotion priorities
   - Emotions below the threshold are automatically removed
   - Configure decay rate and threshold in the sidebar

4. **Configuration**:
   - **Decay Rate**: How much priority decreases (e.g., 0.1 = 10% decrease)
   - **Removal Threshold**: Minimum priority to keep emotions in queue
   - **Clear All**: Remove all emotions from the queue

### Example Workflow

1. Add "Happiness" with priority 5.0
2. Add "Stress" with priority 8.0
3. Add "Excitement" with priority 3.0
4. Observe that "Stress" is highlighted as highest priority
5. Click "Apply Decay" to see all priorities decrease
6. Repeat decay to watch emotions gradually fade away

## Technical Details

### Max-Heap Implementation

The emotion queue uses Python's `heapq` module with negative priorities to simulate a max-heap:
- Emotions with higher priorities appear first
- Efficient O(log n) insertion and extraction
- Stable sorting using counter for equal priorities

### Decay Algorithm

```python
new_priority = current_priority * (1 - decay_rate)
```

- Default decay rate: 10% per application
- Default threshold: 0.1 (emotions below this are removed)
- All emotions decay simultaneously

### Data Structure

Each emotion contains:
- **Name**: String identifier
- **Priority**: Float value (higher = more important)
- **Timestamp**: When the emotion was added
- **Heap Priority**: Negative priority for max-heap behavior

## Files

- `app.py`: Main Streamlit application
- `emotion_queue.py`: EmotionPriorityQueue class implementation
- `requirements.txt`: Python dependencies
- `README.md`: This documentation

## Dependencies

- **Streamlit**: Web interface framework
- **Pandas**: Data manipulation and display
- **Python Standard Library**: heapq, datetime, typing, dataclasses

## Customization

You can easily modify:
- Default decay rate and threshold values
- UI colors and styling
- Emotion validation rules
- Additional emotion metadata
- Export/import functionality

Enjoy exploring the dynamics of emotion priorities! 🎭 