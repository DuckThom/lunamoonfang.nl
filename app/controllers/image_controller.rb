class ImageController < ApplicationController

  def show
    image = Image.find_by_url_hash(params[:id]) or not_found

    if not image.nil?
      response.header['Content-Type'] = "image/#{image.image_type}"
      send_data image.image_data, type: image.image_type, disposition: 'inline'
    end
  end

end
