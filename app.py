import streamlit as st
import pandas as pd
from datetime import datetime
from emotion_queue import EmotionPriorityQueue, Emotion

# Configure page
st.set_page_config(
    page_title="Emotion Priority Queue Visualizer",
    page_icon="🎭",
    layout="wide"
)

# Initialize session state
if 'emotion_queue' not in st.session_state:
    st.session_state.emotion_queue = EmotionPriorityQueue(decay_rate=0.1, threshold=0.1)

def display_emotions():
    """Display the current emotions in the queue."""
    emotions = st.session_state.emotion_queue.get_all_emotions()
    
    if not emotions:
        st.info("No emotions in the queue. Add some emotions to get started!")
        return
    
    # Get highest priority emotion for highlighting
    highest_priority_emotion = st.session_state.emotion_queue.get_highest_priority_emotion()
    
    # Create DataFrame for display
    data = []
    for emotion in emotions:
        is_highest = (highest_priority_emotion and 
                     emotion.name == highest_priority_emotion.name and 
                     emotion.timestamp == highest_priority_emotion.timestamp)
        
        data.append({
            'Emotion': emotion.name,
            'Priority': f"{emotion.priority:.2f}",
            'Added': emotion.timestamp.strftime("%H:%M:%S"),
            'Highest Priority': "🔥" if is_highest else ""
        })
    
    df = pd.DataFrame(data)
    
    # Display with highlighting
    st.subheader("🎭 Current Emotion Queue")
    
    # Show highest priority emotion prominently
    if highest_priority_emotion:
        st.success(f"**Highest Priority:** {highest_priority_emotion.name} "
                  f"(Priority: {highest_priority_emotion.priority:.2f})")
    
    # Display table
    st.dataframe(
        df,
        use_container_width=True,
        hide_index=True
    )
    
    # Show queue statistics
    col1, col2, col3 = st.columns(3)
    with col1:
        st.metric("Total Emotions", len(emotions))
    with col2:
        if highest_priority_emotion:
            st.metric("Highest Priority", f"{highest_priority_emotion.priority:.2f}")
    with col3:
        avg_priority = sum(e.priority for e in emotions) / len(emotions)
        st.metric("Average Priority", f"{avg_priority:.2f}")

def main():
    st.title("🎭 Emotion Priority Queue Visualizer")
    st.markdown("Track and manage emotions with their priorities. Watch as emotions decay over time!")
    
    # Assignment info
    st.markdown("---")
    col1, col2, col3 = st.columns([1, 2, 1])
    with col2:
        st.markdown("""
        <div style='text-align: center; background-color: #e8f4f8; padding: 20px; border-radius: 10px; border: 1px solid #1f77b4;'>
            <p style='color: #333; font-weight: bold; margin: 5px 0;'>Developed by: Abhineet (UID: 24bcs10039)</p>
            <p style='color: #333; font-weight: bold; margin: 5px 0;'>Course: Advanced Data Structures and Algorithms (ADSA)</p>
            <p style='color: #333; font-weight: bold; margin: 5px 0;'>Implementation: Max-Heap Priority Queue with Decay Mechanism</p>
            <p style='color: #555; font-style: italic; margin: 5px 0;'>Demonstrating heap operations, priority management, and interactive visualization</p>
        </div>
        """, unsafe_allow_html=True)
    st.markdown("---")
    
    # Sidebar for configuration
    with st.sidebar:
        st.header("⚙️ Configuration")
        
        # Decay settings
        decay_rate = st.slider(
            "Decay Rate", 
            min_value=0.01, 
            max_value=0.5, 
            value=st.session_state.emotion_queue.decay_rate,
            step=0.01,
            help="How much priority decreases with each decay (0.1 = 10% decrease)"
        )
        
        threshold = st.slider(
            "Removal Threshold", 
            min_value=0.01, 
            max_value=1.0, 
            value=st.session_state.emotion_queue.threshold,
            step=0.01,
            help="Emotions below this priority will be removed during decay"
        )
        
        # Update queue settings
        st.session_state.emotion_queue.decay_rate = decay_rate
        st.session_state.emotion_queue.threshold = threshold
        
        st.divider()
        
        # Demo button
        if st.button("🎯 Load Demo Data", type="primary"):
            st.session_state.emotion_queue.clear()
            # Assignment submission emotions by Abhineet UID: 24bcs10039
            demo_emotions = [
                ("Panic", 9.5),  # Last minute submission
                ("Relief", 8.0),  # Finally submitted
                ("Anxiety", 7.5),  # Waiting for results
                ("Pride", 6.0),  # Completed the work
                ("Stress", 5.5),  # From coding pressure
                ("Excitement", 4.0),  # New DSA concepts learned
                ("Frustration", 3.5),  # Debugging issues
                ("Satisfaction", 3.0),  # Code working
                ("Curiosity", 2.0),  # About algorithms
                ("Tiredness", 1.5)  # Late night coding
            ]
            
            for emotion, priority in demo_emotions:
                st.session_state.emotion_queue.add_emotion(emotion, priority)
            
            st.success("Demo loaded! Assignment submission emotions by Abhineet (UID: 24bcs10039)")
            st.rerun()
        
        # Clear button
        if st.button("🗑️ Clear All Emotions", type="secondary"):
            st.session_state.emotion_queue.clear()
            st.rerun()
    
    # Main interface
    col1, col2 = st.columns([1, 2])
    
    with col1:
        st.subheader("➕ Add New Emotion")
        
        with st.form("add_emotion_form"):
            emotion_name = st.text_input(
                "Emotion Name",
                placeholder="e.g., Happiness, Anxiety, Excitement...",
                help="Enter the name of the emotion"
            )
            
            priority = st.number_input(
                "Priority",
                min_value=0.1,
                max_value=10.0,
                value=1.0,
                step=0.1,
                help="Higher numbers = higher priority"
            )
            
            submitted = st.form_submit_button("Add Emotion", type="primary")
            
            if submitted:
                if emotion_name.strip():
                    st.session_state.emotion_queue.add_emotion(emotion_name.strip(), priority)
                    st.success(f"Added '{emotion_name}' with priority {priority}")
                    st.rerun()
                else:
                    st.error("Please enter an emotion name")
        
        st.divider()
        
        # Decay controls
        st.subheader("⏰ Decay Controls")
        
        if st.button("Apply Decay", type="secondary", use_container_width=True):
            removed_count = st.session_state.emotion_queue.apply_decay()
            if removed_count > 0:
                st.info(f"Decay applied! Removed {removed_count} emotion(s) below threshold.")
            else:
                st.info("Decay applied! No emotions were removed.")
            st.rerun()
        
        st.caption(f"Current decay rate: {decay_rate*100:.0f}% decrease")
        st.caption(f"Removal threshold: {threshold:.2f}")
    
    with col2:
        display_emotions()
    
    # Instructions
    with st.expander("📋 How to Use"):
        st.markdown("""
        **Quick Start:**
        - Click "🎯 Load Demo Data" to see assignment submission emotions
        - Demo shows emotions from Abhineet's DSA assignment (UID: 24bcs10039)
        
        **Adding Emotions:**
        1. Enter an emotion name (e.g., "Joy", "Anxiety", "Excitement")
        2. Set its priority (higher = more important)
        3. Click "Add Emotion"
        
        **Applying Decay:**
        - Click "Apply Decay" to reduce all priorities
        - Emotions below the threshold will be removed
        - Adjust decay rate and threshold in the sidebar
        
        **Visual Features:**
        - 🔥 indicates the highest priority emotion
        - Emotions are sorted by priority (highest first)
        - Timestamps show when each emotion was added
        
        **Example Workflow:**
        1. Load demo data or add emotions manually
        2. Observe "Panic" as highest priority (assignment deadline!)
        3. Apply decay to see how emotions fade over time
        4. Watch relief and pride persist longer than stress
        """)



if __name__ == "__main__":
    main() 