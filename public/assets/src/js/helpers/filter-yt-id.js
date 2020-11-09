/*
 * Extract a youtube ID from a url string 
 *
 */
export const filterYTid = (url) =>{

    let output = '';
    const videoUrl = url;

    if(!videoUrl){
        return output;
    }else if(typeof url !== "string"){
        return output;
    }    

   const match = videoUrl.match(/watch\?v=(.*(?=\&))|watch\?v=(.*)/);		
    
   if(match){
       output = match[1];
   }
    
    return output;    
}