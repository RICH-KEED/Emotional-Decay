# 🚀 Deployment Instructions

## Option 1: Streamlit Community Cloud (Recommended)

### Prerequisites
1. Push your code to GitHub repository
2. Make sure all files are committed:
   - `app.py`
   - `emotion_queue.py` 
   - `requirements.txt`
   - `.streamlit/config.toml`

### Steps
1. Go to [share.streamlit.io](https://share.streamlit.io)
2. Sign in with GitHub
3. Click "New app"
4. Select your repository: `Emotional-Decay`
5. Main file path: `app.py`
6. Click "Deploy!"

### URL Format
Your app will be available at: `https://your-username-emotional-decay-app-xyz.streamlit.app`

---

## Option 2: Render

### Prerequisites
1. Push code to GitHub
2. Sign up at [render.com](https://render.com)

### Steps
1. Connect your GitHub account
2. Click "New +" → "Web Service"
3. Select your `Emotional-Decay` repository
4. Configure:
   - **Name**: `emotion-queue-abhineet`
   - **Environment**: `Python 3`
   - **Build Command**: `pip install -r requirements.txt`
   - **Start Command**: `streamlit run app.py --server.port=$PORT --server.address=0.0.0.0`
5. Click "Create Web Service"

### URL Format
Your app will be available at: `https://emotion-queue-abhineet.onrender.com`

---

## Quick Git Commands

```bash
# Add all files
git add .

# Commit changes
git commit -m "Add ADSA emotion queue visualizer by Abhineet (24bcs10039)"

# Push to GitHub
git push origin main
```

---

## Recommended: Streamlit Cloud
- ✅ Free forever
- ✅ Automatic deployments from GitHub
- ✅ Optimized for Streamlit
- ✅ Easy sharing with professors
- ✅ Custom domain possible

Choose Streamlit Cloud for the easiest deployment! 🎯 