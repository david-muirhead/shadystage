document.addEventListener('DOMContentLoaded', () => {
  const stretchText = document.querySelector('.stretch');
  const minScale = 1; // starting scale
  const maxScale = 1.5; // maximum vertical stretch
  
  const handleScroll = () => {
    // Get the element's position relative to viewport
    const rect = stretchText.getBoundingClientRect();
    const viewportHeight = window.innerHeight;
    
    // Calculate how far the element is through the viewport
    const distanceFromTop = rect.top;
    const elementHeight = rect.height;
    
    // Calculate the percentage through the viewport (0 to 1)
    let scrollProgress = 1 - (distanceFromTop / (viewportHeight - elementHeight));
    
    // Clamp the value between 0 and 1
    scrollProgress = Math.max(0, Math.min(scrollProgress, 1));
    
    // Calculate new scale value (only scaling Y axis)
    const scaleY = minScale + (maxScale - minScale) * scrollProgress; 
    
    // Apply the vertical stretch transformation
    stretchText.style.transform = `scaleY(${scaleY})`;
  };

  // Add scroll event listener with throttling for better performance
  let ticking = false;
  window.addEventListener('scroll', () => {
    if (!ticking) {
      window.requestAnimationFrame(() => {
        handleScroll();
        ticking = false;
      });
      ticking = true;
    }
  });
  
  // Initial call to set initial state
  handleScroll();
}); 