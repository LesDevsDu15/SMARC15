# SMARC15
<!--
<p>
  <img src="https://github.com/user-attachments/assets/36371c62-4895-457a-a9df-3d9e51672058" width="15%" align="top" />
  Saint-Mamet Auto Radio Club, official website by goodup302 with love &lt;3.
</p>
-->

Saint-Mamet Auto Radio Club — official website by **goodup302** and **benben15**.

<p align="center">
  <img src="https://github.com/user-attachments/assets/d94fe0a3-1a0d-4054-8173-56fdef51f109" width="50%" />
</p>
<p align="center">
  Saint-Mamet RC racetrack
</p>

## Actors
- **Julien Fernandes / Goodup302 (Developer):** [GitHub](https://github.com/Goodup302)  
- **Serre Benoît / BENBEN15 (Developer):** [GitHub](https://github.com/BENBEN15)  
- **Saint-Mamet Auto Radio Club (SMARC) – Product Owner**  

## Objectives
Develop and deploy a communication website for the SMARC RC club.  
The main goal is to strengthen the club’s online presence and use its website to promote events, infrastructure, and activities to attract more enthusiasts to the hobby.  

## Project Requirements
Below is an overview of the client’s initial requirements for **V1 of the website**:  

### Front-End
- Display most content on the main homepage  
- Simple layout with header and footer, using anchor links for navigation  
- High-definition photo sliders (*placeholders to be used initially*)  
- Multiple sections describing the club (events, history, photo captions, etc.) (*Lorem ipsum placeholders initially*)  
- Club contact information (*to be defined and provided privately*)  
- Club location (map marker) or static satellite image + address if map integration is not possible  
- Presentation video on a default media player (*placeholder initially, final video provided later*)  
- FFRC federation mentions (logo, info, etc.) (*to be provided later*)  
- League AURA mentions (*to be defined with client*)  
- Contact form or contact information (*to be communicated privately*)  
- Facebook feed integration (preferred) or social links (Facebook)  
- Download link for registration form (administrable)  

### Back-End
- Administration interface (**WordPress / Gutenberg**)  
- SEO optimization  
- Traffic monitoring  
- Contact form  

## Wireframe
Wireframe of the main page to illustrate the general layout requirements.

❗ **WORK IN PROGRESS**

## Technical
WordPress has been chosen as the framework to meet the requirements outlined above.

## Website Content
Information to gather from the client and other sources:  
- High-definition photos  
- Contact information  
- Location / address  
- Edited presentation video  
- Drone aerial footage of the track  
- FFRC and AURA league logos and information  
- Text content (history, events, trivia, etc.)  

## Examples and Resources
Example free HTML website template: [Future Imperfect](https://html5up.net/uploads/demos/future-imperfect/)  

SASS color palette based on the template, with the club’s accent color (Smarc pink):  
```scss
$palette: (
    bg:          #ffffff,
    bg-alt:      #f4f4f4,
    fg:          #646464,
    fg-bold:     #3c3b3b,
    fg-light:    #aaaaaa,
    border:      rgba(160,160,160,0.3),
    border-bg:   rgba(160,160,160,0.075),
    border-alt:  rgba(160,160,160,0.65),
    accent:      #f62c97 /* Smarc pink color – main accent color to be used consistently */
);
