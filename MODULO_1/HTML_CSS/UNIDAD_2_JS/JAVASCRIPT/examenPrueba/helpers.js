
export const switchSection = (section) => {
    const sections = ['plates-section', 'menu-section', 'ofert-section'];
    sections.forEach(sec => {
      document.getElementById(sec).style.display = sec === section ? 'block' : 'none';
    });
  };
  